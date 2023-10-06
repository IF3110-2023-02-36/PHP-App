<?php 

class CategoryController extends Controller{
    public function index($page = 1){
        if($this->userRole !== 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }
        
        $categoryModel = $this->model("CategoryModel");

        $categoryData = $categoryModel->getCategory()->fetch_all();
        require_once __DIR__ . '/../function/arrayPagination.php';
        $pageData = arrayPagination($categoryData, $page, $this->pageLimit);
        $data = [
            "data" => $categoryData,
            "pageData" => $pageData,
            "page" => $page,
            "pageLimit" => $this->pageLimit
        ];

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }
}