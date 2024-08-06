<?php
namespace core\db;

use core\db\Config;
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
        $this->dbHost = Config::$DB_HOST;
        $this->dbUser = Config::$DB_USER;
        $this->dbName = Config::$DB_NAME;
        $this->dbPass = Config::$DB_PASS;
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