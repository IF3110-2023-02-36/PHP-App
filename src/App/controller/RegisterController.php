<?php

class RegisterController extends Controller{
    public function index() {
        $view = $this->view('login', 'Register');

        $view->render();
    }

    public function post() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userModel = $this->model("UserModel");
            $userModel->addUser($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);
            header("Location: /");
            exit;
        }else {
            throw new Exception('Method Not Allowed', 405);
        }
    }
    
}