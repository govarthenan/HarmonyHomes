<?php
/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class Finance
{
    private $db;
    public $primary_table = 'staff';

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Retrieves the display name of a user based on their ID.
     *
     * @param int $user_id The ID of the user.
     * @return string The full name of the user.
     */
    public function getUserDisplayName(int $user_id)
    {
        $this->db->prepareQuery("SELECT name FROM {$this->primary_table} WHERE staff_id = :id");
        $this->db->bind('id', $user_id);

        $row = $this->db->singleResult();

        return $row->name;  // return string full name
    }

    public function fetchAllComplaints()
    {
        $this->db->prepareQuery('SELECT complaint.*, resident.name FROM complaint JOIN resident ON complaint.user_id = resident.user_id');
        return $this->db->resultSet();
    }

    /**
     * Checks if records exist in the specified billing table for a given month and year.
     *
     * @param string $month The month for which to check records.
     * @param string $year The year for which to check records.
     * @param string $billing_type The type of billing table to check ('water' or 'power').
     * @return bool Returns true if records exist, false otherwise.
     */
    public function checkRecordsExist($month, $year, $billing_type)
    {
        $target_table = $billing_type === 'water' ? 'billing_water' : 'billing_power';

        $this->db->prepareQuery('SELECT * FROM ' . $target_table . ' WHERE month = :month AND year = :year');
        $this->db->bind('month', $month);
        $this->db->bind('year', $year);

        $row = $this->db->singleResult();

        // return true if rows exist
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Records CSV data into the database.
     *
     * @param array $data The data array containing the CSV and other parameters.
     * @return bool Returns true if the CSV data is successfully recorded, false otherwise.
     */
    public function recordCsv($data)
    {
        // $data['csv'] contains League\Csv\Reader Object

        $csv = $data['csv'];
        $month = $data['month'];
        $year = $data['year'];
        $billing_type = $data['billing_type'];

        // determine target table
        $target_table = $billing_type === 'water' ? 'billing_water' : 'billing_power';

        // db query
        $this->db->prepareQuery('INSERT INTO ' . $target_table . ' (uploader_id, floor, door, month, year, amount) VALUES (:uploader_id, :floor, :door, :month, :year, :amount)');

        foreach ($csv as $line) {
            try {
                try {
                    // bind values
                    $this->db->bind('uploader_id', $_SESSION['user_id']);
                    $this->db->bind('floor', $line['floor']);
                    $this->db->bind('door', $line['door']);
                    $this->db->bind('month', $month);
                    $this->db->bind('year', $year);
                    $this->db->bind('amount', $line['amount']);
                } catch (Throwable $th) {
                    flash('error_csv_parsing', 'Unknown error in CSV, please check and reupload!', 'alert alert-error');
                    return false;
                }

                // execute query
                $this->db->execute();
            } catch (Throwable $th) {
                flash('error_csv_record', 'Error recording CSV data!', 'alert alert-error');
                return false;
            }
        }

        return true;
    }

    /**
     * Update the master table from a CSV file for a specific month, year, and billing type.
     *
     * @param string $month The month of the CSV data.
     * @param string $year The year of the CSV data.
     * @param string $billing_type The type of billing (water or power).
     * @return bool Returns true if the update is successful, false otherwise.
     */
    public function updateMasterFromCsv($month, $year, $billing_type)
    {
        // set target table
        $target_table = 'billing_resident';

        // set source table
        if ($billing_type == 'water') {
            $source_table = 'billing_water';
        } elseif ($billing_type = 'power') {
            $source_table = 'billing_power';
        } else {
            flash('error_unknown_billing_type', 'Unknown CSV billing type!', 'alert alert-error');
            return false;
        }

        // set target column
        if ($billing_type == 'water') {
            $target_column = 'water';
        } elseif ($billing_type = 'power') {
            $target_column = 'power';
        } else {
            flash('error_unknown_billing_type', 'Unknown CSV billing type!', 'alert alert-error');
            return false;
        }

        // get all csv rows for the month and year
        $this->db->prepareQuery('SELECT * FROM ' . $source_table . ' WHERE month = :month AND year = :year');
        $this->db->bind('month', $month);
        $this->db->bind('year', $year);
        $csv_rows = $this->db->resultSet();

        // for each csv row, update the master table
        foreach ($csv_rows as $row) {
            // check if row exists with the same month, year, floor, door
            $this->db->prepareQuery('SELECT * FROM ' . $target_table . ' WHERE month = :month AND year = :year AND floor = :floor AND door = :door');
            $this->db->bind('month', $month);
            $this->db->bind('year', $year);
            $this->db->bind('floor', $row->floor);
            $this->db->bind('door', $row->door);
            $current_row = $this->db->singleResult();

            // if row exists, update
            if ($current_row) {
                $this->db->prepareQuery('UPDATE ' . $target_table . ' SET ' . $target_column . ' = :amount WHERE month = :month AND year = :year AND floor = :floor AND door = :door');
                $this->db->bind('amount', $row->amount);
                $this->db->bind('month', $month);
                $this->db->bind('year', $year);
                $this->db->bind('floor', $row->floor);
                $this->db->bind('door', $row->door);
                $this->db->execute();
            } else {
                // if row does not exist, insert
                $this->db->prepareQuery('INSERT INTO ' . $target_table . ' (month, year, floor, door, ' . $target_column . ') VALUES (:month, :year, :floor, :door, :amount)');
                $this->db->bind('month', $month);
                $this->db->bind('year', $year);
                $this->db->bind('floor', $row->floor);
                $this->db->bind('door', $row->door);
                $this->db->bind('amount', $row->amount);
                $this->db->execute();
            }
        }
        return true;
    }

    /**
     * Retrieves the payments that are due for the current month and year.
     *
     * @return array Returns an array of payment records.
     */
    public function getPaymentsDue()
    {
        // get payments that belong to this month
        $this->db->prepareQuery('SELECT * FROM billing_resident WHERE month = :month AND year = :year');
        $this->db->bind('month', date('m'));
        $this->db->bind('year', date('Y'));
        return $this->db->resultSet();
    }

    public function getPaymentsOverdue()
    {
        // get payments that belong to months before this
        $this->db->prepareQuery('SELECT * FROM billing_resident WHERE (year < :year) OR (year = :year AND month < :month)');
        $this->db->bind('month', date('m'));
        $this->db->bind('year', date('Y'));
        return $this->db->resultSet();
    }

    /**
     * Retrieves the finished payments from the billing_resident table.
     *
     * This method retrieves rows from the billing_resident table where at least one of the columns water_paid, power_paid, or maintenance_paid has the value of one.
     *
     * @return array Returns an array of rows representing the finished payments.
     */
    public function getFinishedPayments()
{
        // get rows where at least one of the columns water_paid, power_paid, maintenance_paid has the value of one
        $this->db->prepareQuery('SELECT * FROM billing_resident WHERE water_paid = 1 OR power_paid = 1 OR maintenance_paid = 1');
        return $this->db->resultSet();
    }
}
