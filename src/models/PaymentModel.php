<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class PaymentModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function setPayment($table, $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAllPayments($table)
    {
        try {
            $query = "SELECT * FROM $table";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getPaymentsBySemesterId($table, $semesterId)
    {
        try {
            $query = "SELECT * FROM $table WHERE semester_id = :semester_id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                "semester_id" => $semesterId
            ]);
            $result = $statement->fetchAll();
            return array_values($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}