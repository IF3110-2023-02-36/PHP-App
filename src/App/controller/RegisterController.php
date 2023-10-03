<?php

class RegisterController extends Controller{
    public function index() {
        $view = $this->view('login', 'Register');

        $view->render();
    }
}