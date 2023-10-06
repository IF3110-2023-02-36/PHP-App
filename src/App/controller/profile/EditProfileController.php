<?php

class EditProfileController extends Controller {
    public function index() {
        $userModel = $this->model("UserModel");
        
        $data = [];

        if (isset($_SESSION['user_id'])) {
            $data = $userModel->getCurrentUser();
        }

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }

    public function post() {
        $userModel = $this->model("UserModel");
        $userModel->changeUser($_POST['username'],
                                $_POST['name'],
                                $_POST['email'],
                                $_POST['description']);
        header('Location:/Profile');
    }
}
