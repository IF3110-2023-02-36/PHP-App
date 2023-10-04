<?php 

class EditCategoryController extends Controller{
    public function post(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category_id = $_POST['category_id'];
            $category_name = $_POST["category_name"];
            
            $categoryModel = $this->model("categoryModel");

            $categoryModel->updateCategory($category_id, $category_name);
        }
    }
}