<?php

class Controller{
    public function view($folder, $filename, $data = []) {
        require_once __DIR__ . "./../views/View.php";
        return new View($folder, $filename, $data);
    }

    public function model($model){
        require_once __DIR__. "/../models/$model.php";
        return new $model();
    }
}