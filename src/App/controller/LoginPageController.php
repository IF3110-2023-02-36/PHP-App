<?php

class LoginPageController extends Controller{
    public function index() {
        $view = $this->view('login', 'login');

        $view->render();
    }
}