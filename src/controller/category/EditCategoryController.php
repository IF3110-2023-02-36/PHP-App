<?php 

class EditCategoryController extends Controller{
    public function post(){
        if($this->userRole !== 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $category_id = $_POST['category_id'];
        $category_name = $_POST["category_name"];
        
        $categoryModel = $this->model("categoryModel");

        $categoryModel->updateCategory($category_id, $category_name);
    }
}