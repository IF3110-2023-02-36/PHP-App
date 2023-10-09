<?php

class ProfileController extends Controller
{
    public function index()
    {
        if($this->userRole === 0) {
            header("Location: /login");
            exit();
        }

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
}
