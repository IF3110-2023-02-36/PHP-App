<?php 

class addCategoryController extends Controller{
    public function post(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category_name = $_POST["category_name"];
            
            $categoryModel = $this->model("CategoryModel");

            $categoryModel->addCategory($category_name);

            header("Location: /category");
        }
    }
}