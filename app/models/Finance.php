<?php
// league/csv library

use League\Csv\Reader;
use League\Csv\Statement;

require_once '../vendor/autoload.php';

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
}
