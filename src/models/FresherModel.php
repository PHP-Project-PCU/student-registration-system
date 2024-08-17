<?php

namespace models;

use core\db\MySQL;
use PDOException;

class FresherModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            // If $this->db is not a PDO object, log the error or handle it
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function setFreshers($table, $datas)
    {
        try {
            foreach ($datas as $data) {
                $columns = implode(", ", array_keys($data));
                $placeholders = ":" . implode(", :", array_keys($data));

                $statement = $this->db->prepare("
                INSERT INTO $table ($columns) VALUES ($placeholders)
                ");

                // Bind the values to the placeholders
                foreach ($data as $key => $value) {
                    $statement->bindValue(":$key", $value);
                }

                // Execute the prepared statement
                $statement->execute();
            }

            return true;
        } catch (PDOException $e) {
            // Log the exception or handle it as needed
            return $e->getMessage();
        }
    }
    public function checkFresher($table, $rollNum, $year)
    {
        try {
            $statement = $this->db->prepare(
                "
                SELECT id FROM $table WHERE matriculation_roll_num = :rollNum AND passing_year = :year
                
                "
            );
            $statement->bindValue(":rollNum", $rollNum);
            $statement->bindValue(":year", $year);
            $statement->execute();

            $result = $statement->fetchAll();
            return !empty($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
