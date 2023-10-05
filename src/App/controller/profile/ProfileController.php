<?php

class ProfileController extends Controller
{
    public function index()
    {
        $userModel = $this->model("UserModel");

        // if (isset($_SESSION['user_id'])) {
        // $data = $userModel->getUser($_SESSION['user_id'])->fetch_assoc();
        // } else {
        //     header("Location: /login");
        //     exit();
        // }

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, []);

        $view->render();
    }
}
