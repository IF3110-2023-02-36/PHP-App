<?php

class ManageController extends Controller{
    public function index() {
        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName);

        $view->render();
    }
}