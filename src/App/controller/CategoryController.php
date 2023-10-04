<?php 

class CategoryController extends Controller{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            throw new Exception('Method not allowed', 405);
        }
        $productModel = $this->model("CategoryModel");

        $data = $productModel->getCategory()->fetch_all();
        // print_r($data);

        // require_once __DIR__. "./../components/home.php";
        $view = $this->view('category', 'category', $data);

        $view->render();
    }

    public function create(){
        // if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //     throw new Exception('Method not allowed', 405);
        // }

        $data = []; //get data kategori dulu
        $view = $this->view('category', 'addCategory', $data);

        $view->render();
    }
}