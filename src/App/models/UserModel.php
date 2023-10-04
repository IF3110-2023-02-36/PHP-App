<?php


class UserModel extends Model{

    public function getAllUsers(){
        $query = "SELECT * FROM users";
        return $this->database->execute($query);
    }

    public function loginUser($username, $password) {
        $query = 'SELECT username, password FROM users WHERE username = ? LIMIT 1';
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("s", $username);
        $executeOk = $statement->execute();
        if(!$executeOk)return NULL;
        $result= $statement->get_result();
        if(!$result)return NULL;
        $result = $result->fetch_all();
        $statement->close();
        if(count($result) === 0)throw new Exception('Username is not exist', 400);
        
        $result = $result[0];
        $userPassword = $result[1];
        if($password !== $userPassword)throw new Exception('Password is incorrect', 400);
        $_SESSION['user_id'] = $username;
    }

    public function addUser($name, $username, $email, $password) {
        $isUsernameExist = $this->checkUsernameExist($username);
        if($isUsernameExist)throw new Exception('Username already exist', 400);
        $isEmailExist = $this->checkEmailExist($email);
        if($isEmailExist)throw new Exception('Email already exist', 400);

        $query = "INSERT INTO users (name, username, email, password) 
                                    VALUES (?, ?, ?, ?)";
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("ssss", $name, $username, $email, $password);
        $executeOk = $statement->execute();
        if(!$executeOk)throw new Exception('Insertion error', 400);
        $_SESSION['user_id'] = $username;
    }

    private function checkEmailExist($email) {
        $query = 'SELECT 1 FROM users WHERE email = ? LIMIT 1';
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("s", $email);
        $executeOk = $statement->execute();
        if(!$executeOk)return true;
        $result= $statement->get_result();
        if(!$result)return true;
        $result = $result->fetch_all();
        $statement->close();
        $isExist = (count($result) === 1);
        return $isExist;
    }

    private function checkUsernameExist($username) {
        $query = 'SELECT 1 FROM users WHERE username = ? LIMIT 1';
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("s", $username);
        $executeOk = $statement->execute();
        if(!$executeOk)return true;
        $result= $statement->get_result();
        if(!$result)return true;
        $result = $result->fetch_all();
        $statement->close();
        $isExist = (count($result) === 1);
        return $isExist;
    }
}