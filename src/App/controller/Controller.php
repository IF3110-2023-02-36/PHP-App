<?php


class Controller{
    protected $userRole;
    protected $pageLimit = 10;
    public function __construct() {
        require_once __DIR__ . "../../views/Routes.php";
        require_once __DIR__ . "../../controller/function/getUserRole.php";

        $this->userRole = getUserRole();
    }

    public function view($folder, $filename, $data = []) {
        require_once __DIR__ . "./../views/View.php";
        return new View($folder, $filename, $data);
    }

    public function model($model){
        require_once __DIR__. "/../models/$model.php";
        return new $model();
    }
}