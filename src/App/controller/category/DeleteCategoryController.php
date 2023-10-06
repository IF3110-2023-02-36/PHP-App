<?php 

class DeleteCategoryController extends Controller{
    public function post(){
        if($this->userRole !== 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }

        $id = $_POST["category_id"];
        $categoryModel = $this->model("CategoryModel");
        $categoryModel->deleteCategory($id);
    }
}