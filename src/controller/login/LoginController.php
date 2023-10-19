<?php

class LoginController extends Controller{
    public function index() {
        if($this->userRole !== 0) {
            header("Location: /");
            exit();
        }
        
        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName);

        $view->render();
    }

    public function post() {
        $userModel = $this->model("UserModel");
        $userModel->loginUser($_POST['username'], $_POST['password']);
        header("Location: /");
    }
}