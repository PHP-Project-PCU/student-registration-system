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

    public function createAcademicYear($table, $data)
    {
        try {
            $sql = "INSERT INTO $table (academic_year) 
                    VALUES (:academic_year)";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ':academic_year' => $data,
            ]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllAcademicYear($table)
    {
        try {
            $sql = "SELECT * FROM $table
                    ORDER BY LEFT(academic_year,4) DESC";
            $statement = $this->db->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateAcademicYear($table, $id, $data)
    {
        try {
            $sql = " UPDATE $table SET academic_year=:academic_year WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ":id" => $id,
                ":academic_year" => $data
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteAcademicYear($table, $id)
    {
        try {
            $sql = "DELETE FROM $table WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([":id" => $id]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
