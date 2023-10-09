<?php 

class addCategoryController extends Controller{
    public function post(){
        if($this->userRole === 1) {
            throw new Exception("You are not allowed to view this page", 405);
        }else if($this->userRole === 0) {
            header("Location: /login");
            exit();
        }

        $category_name = $_POST["category_name"];
        
        $categoryModel = $this->model("CategoryModel");

        $categoryModel->addCategory($category_name);

        header("Location: /category");
    }
}