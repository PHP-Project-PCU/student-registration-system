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

                // // Execute the prepared statement
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

    public function setIndividualFresher($table, $data)
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

    public function getFresherPaginationData($table, $page, $limit, $passingYear = null)
    {
        $offset = ($page - 1) * $limit;

        try {
            if ($passingYear) {
                $statement = $this->db->prepare("
                    SELECT * FROM $table WHERE passing_year = :passingYear ORDER BY id LIMIT :limit OFFSET :offset 
                ");
                // Bind the values as integers
                $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
                $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
                $statement->bindValue(':passingYear', $passingYear, \PDO::PARAM_STR);
            } else {
                $statement = $this->db->prepare("
                SELECT * FROM $table ORDER BY id LIMIT :limit OFFSET :offset 
                ");
                // Bind the values as integers
                $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
                $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
            }

            $statement->execute();
            return $statement->fetchAll();  // Use fetchAll() if you expect multiple rows
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function getTotalRows($table, $passingYear = null)
    {
        try {
            if ($passingYear) {
                $query = "SELECT COUNT(*) as total FROM $table WHERE passing_year = :passingYear";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':passingYear', $passingYear);
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

    public function updateFresher($table, $updateData)
    {
        try {
            $query = "UPDATE $table SET student_name = :student_name , matriculation_roll_num = :matriculation_roll_num,nrc_num = :nrc_num,matriculation_mark = :matriculation_mark,passing_year=:passing_year WHERE id=:id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $updateData['id'],
                ":student_name" => $updateData['student_name'],
                ":matriculation_roll_num" => $updateData['matriculation_roll_num'],
                ":nrc_num" => $updateData['nrc_num'],
                ":matriculation_mark" => $updateData['matriculation_mark'],
                ":passing_year" => $updateData['passing_year']
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateFresherDeleteStatus($table, $deleteStatusData)
    {
        try {
            $query = "UPDATE $table SET delete_status = :delete_status WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([
                ":id" => $deleteStatusData['id'],
                ":delete_status" => $deleteStatusData['delete_status']
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function truncateFresherData($table)
    {
        try {
            $query = "TRUNCATE TABLE $table";
            $statement = $this->db->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getFresherPassingYear($table)
    {
        try {
            $query = "SELECT DISTINCT passing_year FROM $table";
            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}