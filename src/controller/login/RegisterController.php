<?php

class RegisterController extends Controller{
    public function index() {
        if($this->userRole !== 0) {
            header("Location: /");
            exit();
        }

        $this->render();
    }

    public function post() {
        if($this->userRole !== 0) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $userModel = $this->model("UserModel");
        $userModel->addUser($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
        header("Location: /");
    }
}