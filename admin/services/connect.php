<?php

session_start();
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');

class Database
{
    private $host = "localhost";
    private $dbname = "final_project_csemn";
    private $username = "root";
    private $password = "";
    private $conn = null;

    public function connect()
    {
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . '; 
                                dbname=' . $this->dbname . '; 
                                charset=utf8',
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $exception->getMessage();
            exit();
        }
        return $this->conn;
    }
}

$Database = new Database();
$connect = $Database->connect();