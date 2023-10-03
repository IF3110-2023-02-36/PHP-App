<?php

class NotFoundController extends Controller{
    public function index() {
        $view = $this->view('home', 'NotFound');

        $view->render();
    }
}