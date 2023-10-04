<?php

class LoginController extends Controller{
    public function index() {
        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName);

        $view->render();
    }

    public function post() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userModel = $this->model("UserModel");
            $userModel->loginUser($_POST['username'], $_POST['password']);
            header("Location: /");
            exit;
        }else {
            throw new Exception('Method Not Allowed', 405);
        }
    }
}