<?php

class LoginController extends Controller{
    public function index() {
        $view = $this->view('login', 'Login');

        $view->render();
    }
}