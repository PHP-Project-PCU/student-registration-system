<?php

namespace models;

use core\db\MySQL;
use core\helpers\Response;
use PDOException;

class StudentAdmissionModel
{
    private $db = null;



    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function setStudentAdmissions($table, $data)
    {
        $dataSuccess = new Response();
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $statement = $this->db->prepare("
            INSERT INTO $table ($columns) VALUES ($placeholders)
            ");
            $statement->execute($data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}