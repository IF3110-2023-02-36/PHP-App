<?php

class LoginController extends Controller{
    public function index() {
        $view = $this->view('login', 'Login');

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