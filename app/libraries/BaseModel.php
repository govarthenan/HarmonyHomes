<?php
class BaseModel extends Database
{
    protected $table = "";
    public function insert(array $data, string $table, array $allowedColumns = [])
    {
        if (!empty($allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $sql = "INSERT INTO " . $table . " (" . implode(',', array_keys($data)) . ") VALUES (:" . implode(',:', array_keys($data)) . ")";

        $this->prepareQuery($sql);

        foreach ($data as $key => $value) {
            $this->bind(":$key", $value);
        }

        $this->execute();


        // ...
    }
    public function update($data, $table, $where, $allowedColumns)
    {
        if (!empty($allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $sql = "UPDATE" . $table . "SET";
        $conditions = [];
        foreach ($keys as $key) {
            $conditions[] = $key . "=." . $key;
        }
        $sql .= implode(',', $conditions);

        $params = $data;
        $params[':where'] = $where;

        $stmt = $this->db_handler->prepare($sql);
        $stmt->execute($params);



    }
    public function where($table, $column, $value)
    {
        // Add a space between the table name and the WHERE clause
        $sql = "SELECT * FROM " . $table . " WHERE " . $column . " = :value";

        // Prepare the query and bind the parameter value
        $stmt = $this->db_handler->prepare($sql);
        $stmt->bindValue(':value', $value);

        // Execute the query and return the result set
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($data)
    {



        $keys = array_keys($data);

        $sql = "DELETE FROM " . $this->table . " WHERE ";

        $i = 0;
        foreach ($keys as $key) {
            if ($i > 0) {
                $query .= " AND ";
            }
            $query .= $key . "=:" . $key;
            $i++;
        }

        $stmt = $this->db_handler->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;

    }
    public function deleteById($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE ID = :id";
        $stmt = $this->prepareQuery($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

}
