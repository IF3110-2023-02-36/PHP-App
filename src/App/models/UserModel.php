<?php


class UserModel extends Model{

    public function __construct() {
        parent::__construct();
        
        // creating admin
        $adminExists = $this->checkValueExist("users", "category", "admin");
        if (!$adminExists) {
            $this->createAdmin();
        }
    }

    public function getAllUsers(){
        $query = "SELECT * FROM users";
        return $this->database->execute($query);
    }

    public function getUser($username) {
        $query = 'SELECT * FROM users WHERE username = ? LIMIT 1';
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("s", $username);
        $executeOk = $statement->execute();
        if(!$executeOk)return NULL;
        $result= $statement->get_result();
        if(!$result)return NULL;
        $result = $result->fetch_array();
        $statement->close();
        return $result;
    }

    public function getUserById($id) {
        $query = 'SELECT * FROM users WHERE id = ? LIMIT 1';
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("i", $id);
        $executeOk = $statement->execute();
        if(!$executeOk)return NULL;
        $result= $statement->get_result();
        if(!$result)return NULL;
        $result = $result->fetch_array();
        $statement->close();
        return $result;
    }

    public function loginUser($username, $password) {
        $query = 'SELECT username, password FROM users WHERE username = ? LIMIT 1';
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("s", $username);
        $executeOk = $statement->execute();
        if(!$executeOk)throw new Exception("SQL query failed", 400);
        $result= $statement->get_result();
        if(!$result)throw new Exception("SQL query failed", 400);
        $result = $result->fetch_array();
        $statement->close();
        if($result == NULL)throw new Exception('Username is not exist', 400);
        
        $userPassword = $result['password'];
        if($password !== $userPassword)throw new Exception('Password is incorrect', 400);
        $this->setUserSession($username);
    }

    public function addUser($name, $username, $email, $password) {
        $isUsernameExist = $this->checkValueExist("users", "username", $username);
        if($isUsernameExist)throw new Exception('Username already exist', 400);
        $isEmailExist = $this->checkValueExist("users", "email", $email);
        if($isEmailExist)throw new Exception('Email already exist', 400);

        $query = "INSERT INTO users (name, username, email, password) 
                                    VALUES (?, ?, ?, ?)";
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("ssss", $name, $username, $email, $password);
        $executeOk = $statement->execute();
        if(!$executeOk)throw new Exception('Insertion error', 400);
        $this->setUserSession($username);
    }

    public function getCurrentUser() {
        if(!isset($_SESSION['user_id'])) {
            throw new Exception('User not logged in', 405);
        }
        return $this->getUserById($_SESSION['user_id']);
    }

    private function setUserSession($username) {
        $userData = $this->getUser($username);
        $_SESSION['user_id'] = $userData['id'];
    }

    private function createAdmin() {
        $query = "INSERT INTO users (name, username, email, password, category) 
                                    VALUES (?, ?, ?, ?, ?)";
        $statement = $this->database->getConn()->prepare($query);
        $admin = "admin";
        $statement->bind_param("sssss", $admin, $admin, $admin, $admin, $admin);
        $executeOk = $statement->execute();
        if(!$executeOk)throw new Exception('Insertion error', 400);
    }
}