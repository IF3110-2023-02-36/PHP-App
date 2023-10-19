<?php 

class CategoryController extends Controller{
    public function index($page = 1){
        if($this->userRole === 1) {
            throw new Exception("You are not allowed to view this page", 405);
        }else if($this->userRole === 0) {
            header("Location: /login");
            exit();
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

        $this->render($data);
    }
}