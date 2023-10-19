<?php

class LogoutController extends Controller{
    public function index() {
        if($this->userRole === 0) {
            throw new Exception("You are not allowed to view this page", 405);
        }
        
        $this->render();
    }
}