<?php 

class CategoryController extends Controller{
    public function index(){
        if($this->userRole !== 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }
        
        $categoryModel = $this->model("CategoryModel");

        $data = $categoryModel->getCategory()->fetch_all();

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }
}