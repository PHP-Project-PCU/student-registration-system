<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class TeacherModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function enrollNewTeacher($table, $data)
    {
        try {
            $sql = "INSERT INTO $table (teacher_name,dept_id,edu_mail,password) 
                    VALUES (:teacher_name,:dept_id,:edu_mail,:password)";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ":teacher_name" =>  $data['teacher_name'],
                ":dept_id" =>  $data['dept_id'],
                ":edu_mail" =>  $data['edu_mail'],
                ":password" =>  $data['password'],
            ]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllTeachers($table)
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
    public function updateTeacher($table, $id, $data)
    {
        try {
            $sql = "UPDATE $table SET 
                    teacher_name=:teacher_name,
                    dept_id=:dept_id,
                    edu_mail=:edu_mail,
                    password=:password
                    WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ":teacher_name" =>  $data['teacher_name'],
                ":dept_id" =>  $data['dept_id'],
                ":edu_mail" =>  $data['edu_mail'],
                ":password" =>  $data['password'],
                ":id" => $id
            ]);
            var_dump($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteTeacher($table, $id)
    {
        try {
            $sql = "DELETE FROM $table WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([":id" => $id]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
