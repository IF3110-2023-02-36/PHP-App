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

        $data = $userModel->getCurrentUser();

        $this->render($data);
    }
}
