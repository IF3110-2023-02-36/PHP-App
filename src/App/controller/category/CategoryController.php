<?php 

class CategoryController extends Controller{
    public function index(){
        $productModel = $this->model("CategoryModel");

        $data = $productModel->getCategory()->fetch_all();

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }
}