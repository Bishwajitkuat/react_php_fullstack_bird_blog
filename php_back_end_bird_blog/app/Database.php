<?php
class Database
{ // DB parameters
    private $host = 'birdDB';
    private $db_name = 'birddb';
    private $username = 'root';
    private $password = 'bisso';
    private $conn;
    // DB Connect
    public function connect()
    {
        $this->conn = null;
        try {
            // creating new PDO connection
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->db_name", $this->username, $this->password);
            // setting error mode for the connection
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo 'Connection Error ' . $err->getMessage();
        }
        // returning connection
        return $this->conn;
    }
}
