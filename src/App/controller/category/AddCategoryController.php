<?php 

class addCategoryController extends Controller{
    public function post(){
        $category_name = $_POST["category_name"];
        
        $categoryModel = $this->model("CategoryModel");

        $categoryModel->addCategory($category_name);

        header("Location: /category");
    }
}