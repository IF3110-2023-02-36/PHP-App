<?php 

class DeleteCategoryController extends Controller{
    public function post(){
        $id = $_POST["category_id"];
        $categoryModel = $this->model("CategoryModel");
        $categoryModel->deleteCategory($id);
    }
}