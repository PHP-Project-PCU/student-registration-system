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
    private $dbPort;
    private $db;


    public function __construct()
    {
        $this->dbHost = DBConfig::$DB_HOST;
        $this->dbUser = DBConfig::$DB_USER;
        $this->dbName = DBConfig::$DB_NAME;
        $this->dbPass = DBConfig::$DB_PASS;
        $this->dbPort = DBConfig::$DB_PORT;
        $this->db = null;
    }

    public function connect()
    {
        try {
            $this->db = new PDO(
                "mysql:host=$this->dbHost;dbname=$this->dbName;port=$this->dbPort",
                $this->dbUser,
                $this->dbPass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );
            return $this->db;
        } catch (PDOException $e) {
            // Set the response code to 500 Internal Server Error
            http_response_code(500);

            // Log the error for debugging purposes (optional)
            error_log($e->getMessage());

            // Return a generic error message to the client
            echo "Internal Server Error. Please try again later.";
            exit;
        }
    }
}