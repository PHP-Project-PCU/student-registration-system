<?php

namespace models;

use core\db\MySQL;
use PDOException;

class AchievementModel
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

    public function setAchievements($table, $datas)
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

                // // Execute the prepared statement
                $statement->execute();
            }

            return true;
        } catch (PDOException $e) {
            // Log the exception or handle it as needed
            return $e->getMessage();
        }
    }
    public function checkAchievement($table, $rollNum, $semester, $academicYear)
    {
        try {
            $statement = $this->db->prepare(
                "
                SELECT id FROM $table WHERE roll_num = :rollNum AND academic_year = :academicYear AND  semester=:semester

                "
            );
            $statement->bindValue(":rollNum", $rollNum);
            $statement->bindValue(":academicYear", $academicYear);
            $statement->bindValue(":semester", $semester);
            $statement->execute();

            $result = $statement->fetchAll();
            return !empty($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function setIndividualAchievement($table, $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $statement = $this->db->prepare("
        INSERT INTO $table ($columns) VALUES ($placeholders)
        ");

            $statement->execute($data);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAchievementPaginationData($table, $page, $limit, $semester = null, $academicYear = null)
    {
        $offset = ($page - 1) * $limit;

        try {
            $query = "SELECT * FROM $table WHERE 1=1";
            if ($academicYear && $academicYear !== 'all') {
                $query .= " AND academic_year = :academicYear";
            }
            if ($semester && $semester !== 'all') {
                $query .= " AND semester = :semester";
            }
            $query .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";

            $statement = $this->db->prepare($query);
            // Bind the values as integers
            $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
            $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);

            // Conditionally bind the academicYear and semester
            if ($academicYear && $academicYear !== 'all') {
                $statement->bindValue(':academicYear', $academicYear, \PDO::PARAM_STR);
            }
            if ($semester && $semester !== 'all') {
                $statement->bindValue(':semester', $semester, \PDO::PARAM_STR);
            }

            $statement->execute();
            return $statement->fetchAll();  // Use fetchAll() if you expect multiple rows
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }



    public function getTotalRows($table, $semester = null, $academicYear = null)
    {
        try {
            $query = "SELECT COUNT(*) as total FROM $table WHERE 1=1";
            if ($academicYear && $academicYear !== 'all') {
                $query .= " AND academic_year = :academicYear";
            }
            if ($semester && $semester !== 'all') {
                $query .= " AND semester = :semester";
            }

            $statement = $this->db->prepare($query);

            // Conditionally bind the academicYear and semester
            if ($academicYear && $academicYear !== 'all') {
                $statement->bindParam(':academicYear', $academicYear);
            }
            if ($semester && $semester !== 'all') {
                $statement->bindParam(':semester', $semester);
            }

            $statement->execute();
            $result = $statement->fetch();

            return $result->total;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function updateAchievement($table, $updateData)
    {
        try {
            $query = "UPDATE $table SET student_name = :student_name , roll_num = :roll_num, semester=:semester, academic_year=:academic_year WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $updateData['id'],
                ":student_name" => $updateData['student_name'],
                ":roll_num" => $updateData['roll_num'],
                ":semester" => $updateData['semester'],
                ":academic_year" => $updateData['academic_year']
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // public function updateAchievementDeleteStatus($table, $deleteStatusData)
    // {
    //     try {
    //         $query = "UPDATE $table SET delete_status = :delete_status WHERE id = :id";
    //         $statement = $this->db->prepare($query);
    //         $statement->execute([
    //             ":id" => $deleteStatusData['id'],
    //             ":delete_status" => $deleteStatusData['delete_status']
    //         ]);
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }

    // public function truncateAchievementData($table)
    // {
    //     try {
    //         $query = "TRUNCATE TABLE $table";
    //         $statement = $this->db->prepare($query);
    //         $statement->execute();
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function getAchievementAcademicYear($table)
    {
        try {
            $query = "SELECT DISTINCT academic_year FROM $table ORDER BY academic_year DESC";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAchievementSemester($table)
    {
        try {
            $query = "SELECT DISTINCT semester FROM $table ORDER BY semester ASC";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteAchievement($table, $id)
    {
        try {
            $query = "DELETE FROM $table WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $id,
            ]);
            return $statement->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
