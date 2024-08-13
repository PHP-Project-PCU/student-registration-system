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
}