<?php

class LoginController extends Controller{
    public function index() {
        if($this->userRole !== 0) {
            header("Location: /");
            exit();
        }
        
        $this->render();
    }

    public function post() {
        $userModel = $this->model("UserModel");
        $userModel->loginUser($_POST['username'], $_POST['password']);
        header("Location: /");
    }
}