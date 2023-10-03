<?php

class RegisterPageController extends Controller{
    public function index() {
        $view = $this->view('login', 'register');

        $view->render();
    }
}