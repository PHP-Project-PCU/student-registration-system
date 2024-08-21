<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class AcademicYearModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    // public function createDept($table, $data)
    // {
    //     try {
    //         $sql = "INSERT INTO $table (dept_name) 
    //                 VALUES (:dept_name)";
    //         $statement = $this->db->prepare($sql);
    //         $result = $statement->execute([
    //             ':dept_name' => $data,
    //         ]);
    //         return true;
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }
    public function getAllAcademicYear($table)
    {
        try {
            $sql = "SELECT * FROM $table";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
