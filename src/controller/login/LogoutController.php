<?php

class LogoutController extends Controller{
    public function index() {
        if($this->userRole === 0) {
            throw new Exception("You are not allowed to view this page", 405);
        }
        
        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName);

        $view->render();
    }
}