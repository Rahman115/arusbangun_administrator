<?php
class Database {
    private static $instance = null;
    private $conn;
    
    private function __construct() {
        $host = 'localhost';
        $dbname = 'project_management';
        $username = 'root';
        $password = '';
        
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
