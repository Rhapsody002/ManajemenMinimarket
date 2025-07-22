<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "web_minimarket";

    private $conn;
    private $result;

    public function __construct() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function execute($sql) {
        $result = $this->conn->query($sql);
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function query($sql) {
        $this->result = $this->conn->query($sql);
        if ($this->result === false) {
            die("Query error: " . $this->conn->error);
        }
        return $this;
    }

    public function fetchAll() {
        $data = [];
        while ($row = $this->result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetch() {
        return $this->result->fetch_assoc();
    }

    public function getConnection() {
        return $this->conn;
    }

    
}
