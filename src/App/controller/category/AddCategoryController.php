<?php 

class addCategoryController extends Controller{
    public function post(){
        if($this->userRole !== 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $category_name = $_POST["category_name"];
        
        $categoryModel = $this->model("CategoryModel");

        $categoryModel->addCategory($category_name);

        header("Location: /category");
    }
}