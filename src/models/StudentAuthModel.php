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
}