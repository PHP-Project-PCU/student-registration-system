<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class SectionModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }
    public function getAllSections($table)
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
    public function getByStudentId($table, $id)
    {
        try {
            $sql = "SELECT * FROM $table where student_id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ":id" => $id
            ]);
            $data = $statement->fetchAll((PDO::FETCH_ASSOC));
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTotalRows($table, $semester = null, $section = null)
    {
        try {
            if ($semester && $section) {
                $query = "SELECT COUNT(*) as total FROM $table WHERE semester_id = :semester AND section_id = :section";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':semester', $semester);
                $statement->bindParam(':section', $section);
            } else {
                $query = "SELECT COUNT(*) as total FROM $table";
                $statement = $this->db->prepare($query);
            }
            $statement->execute();
            $result = $statement->fetch();

            return $result->total;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateStudentSemesterAndSection($table, $semesterId, $sectionId, $studentId)
    {
        try {
            $query = "UPDATE $table set semester_id = :semesterId,section_id = :sectionId WHERE student_id = :studentId";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':semesterId', $semesterId);
            $statement->bindParam(':sectionId', $sectionId);
            $statement->bindParam(':studentId', $studentId);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteStudentSemesterAndSection($table, $studentId)
    {
        try {
            $query = "DELETE FROM $table WHERE student_id = :studentId";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':studentId', $studentId);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
