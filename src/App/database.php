<?php

class Database{
    private $conn;

    public function __construct(){
        $host = $_ENV['MYSQL_HOST'];
        $username = $_ENV['MYSQL_USER'];
        $password = $_ENV['MYSQL_PASSWORD'];
        $database = $_ENV['MYSQL_DATABASE'];

        $this->conn = new mysqli($host, $username, $password, $database);

        // Check for connection errors
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $this->createTables();
    }

    private function createTables() {
        $this->conn->query("CREATE TABLE IF NOT EXISTS users(
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            email varchar(255) UNIQUE NOT NULL,
            username varchar(255) UNIQUE NOT NULL,
            name varchar(255) NOT NULL,
            password varchar(255) NOT NULL,
            category ENUM('user', 'admin') NOT NULL
        );");
        $this->conn->query("CREATE TABLE IF NOT EXISTS categories(
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL
        );");
        $this->conn->query("CREATE TABLE IF NOT EXISTS products(
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            category_id INTEGER,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            price INTEGER NOT NULL,
            stock INTEGER NOT NULL, 
            FOREIGN KEY (category_id) REFERENCES categories(id)
        );");
        $this->conn->query("CREATE TABLE IF NOT EXISTS carts(
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            user_id INTEGER,
            product_id INTEGER,
            quantity INTEGER NOT NULL,
            FOREIGN KEY (product_id) REFERENCES products(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        );");
        $this->conn->query("CREATE TABLE IF NOT EXISTS product_files(
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            product_id INTEGER,
            file_name varchar(255) NOT NULL,
            file_extension varchar(10) NOT NULL,
            FOREIGN KEY (product_id) REFERENCES products(id)
        );");
    }

    public function execute ($query){
        return $this->conn->query($query);
    }

    public function getConn(){
        return $this->conn;
    }
    function bindParameters(mysqli_stmt $stmt, $types, ...$values) {
        $bindParams = [];
        $bindParams[] = $types;
    
        foreach ($values as &$value) {
            $bindParams[] = &$value;
        }
    
        return call_user_func_array([$stmt, 'bind_param'], $bindParams);
    }
}