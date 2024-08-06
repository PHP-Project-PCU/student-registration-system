<?php
namespace core\db;

use core\db\DBConfig;
use PDO;
use PDOException;

class MySQL
{
    private $dbHost;
    private $dbUser;
    private $dbName;
    private $dbPass;
    private $db;

    public function __construct(
    ) {
        $this->dbHost = DBConfig::$DB_HOST;
        $this->dbUser = DBConfig::$DB_USER;
        $this->dbName = DBConfig::$DB_NAME;
        $this->dbPass = DBConfig::$DB_PASS;
        $this->db = null;
    }

    public function connect()
    {
        try {
            $this->db = new PDO(
                "mysql:host=$this->dbHost;dbname=$this->dbName",
                $this->dbUser,
                $this->dbPass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );
            return $this->db;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}