<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class DeptModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function createDept($table, $data)
    {
        try {
            $sql = "INSERT INTO $table (dept_name) 
                    VALUES (:dept_name)";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ':dept_name' => $data,
            ]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllDepts($table)
    {
        try {
            $sql = "SELECT * FROM $table ORDER BY dept_name ASC";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateDept($table, $id, $data)
    {
        try {
            $sql = " UPDATE $table SET dept_name=:dept_name WHERE dept_id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ":id" => $id,
                ":dept_name" => $data
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteDept($table, $id)
    {
        try {
            $sql = "DELETE FROM $table WHERE dept_id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([":id" => $id]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
