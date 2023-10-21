<?php

class Model{
    protected $database;

    public function __construct(){
        $this->database = new Database();
    }

    protected function checkValueExist($table, $column, $value) {
        $query = "SELECT 1 FROM $table WHERE $column = ? LIMIT 1";
        $statement = $this->database->getConn()->prepare($query);
        $statement->bind_param("s", $value);
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