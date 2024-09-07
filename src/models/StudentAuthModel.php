<?php

namespace models;

use core\db\MySQL;
use PDOException;

class StudentAuthModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function findByStudentEduMailAndPasword($table, $eduMail, $password)
    {
        try {
            $statement = $this->db->prepare("
            SELECT student_id FROM $table WHERE edu_mail = :eduMail AND password = :password
            ");
            $statement->execute([
                'eduMail' => $eduMail,
                'password' => $password
            ]);
            $studentId = $statement->fetch();
            return $studentId ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateStudentPassword($table, $password, $studentId)
    {
        try {
            $statement = $this->db->prepare("
                UPDATE $table SET password = :password WHERE student_id = :studentId
            ");

            $statement->execute([
                "password" => $password,
                "studentId" => $studentId,
            ]);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateStudentResetStatus($table, $studentId)
    {
        try {
            $statement = $this->db->prepare("
                UPDATE $table SET reset_status = 1 WHERE student_id = :studentId
            ");

            $statement->execute([
                "studentId" => intval($studentId)
            ]);

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getStudentResetStatus($table)
    {
        try {
            $statement = $this->db->prepare("
                SELECT reset_status FROM $table ORDER BY id DESC LIMIT 1;
            ");

            $statement->execute();
            return $statement->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}