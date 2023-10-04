<?php

class LogoutController extends Controller{
    public function index() {
        $view = $this->view('login', 'Logout');

        $view->render();
    }
}