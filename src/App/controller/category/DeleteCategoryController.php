<?php 

class DeleteCategoryController extends Controller{
    public function post(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            throw new Exception('Method not allowed', 405);
        }
        $id = $_POST["category_id"];
        $categoryModel = $this->model("CategoryModel");
        $categoryModel->deleteCategory($id);
    }
}