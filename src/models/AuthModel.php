<?php

namespace models;

use core\db\MySQL;
use PDOException;

class AuthModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function findByAdminUserNameAndPasword($table, $user_name, $password)
    {
        try {
            $statement = $this->db->prepare("
            SELECT * FROM $table WHERE user_name = :user_name AND password = :password
            ");
            $statement->execute([
                'user_name' => $user_name,
                'password' => $password
            ]);
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getLastAdminRow($table)
    {
        try {
            $statement = $this->db->prepare("
                SELECT * FROM $table ORDER BY id DESC LIMIT 1
            ");
            $statement->execute();
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateAdminPassword($table, $password, $adminId)
    {
        try {
            $statement = $this->db->prepare("
                UPDATE $table SET password = :password WHERE id = :adminId
            ");

            $statement->execute([
                "password" => $password,
                "adminId" => $adminId,
            ]);
            $row = $statement->fetch();
            return $row ?? false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}