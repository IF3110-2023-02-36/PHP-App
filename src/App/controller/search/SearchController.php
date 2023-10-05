<?php 
class SearchController extends Controller{

    public function post(){
        $query = "";
        $sortVar = "";
        $order = null;
        $category_id = null;
        $minPrice = null;
        $maxPrice = null;
        if(isset($_POST)){
            $query = $_POST['search'];
            $sortVar = $_POST['sort'];
            $order = $_POST['order'];
            $category_id = $_POST['category'];
            $minPrice = $_POST['min-price'];
            $maxPrice = $_POST['max-price'];
        }
        
        
        $productModel = $this->model("ProductModel");

        $product = $productModel->getProductRequested($query, $sortVar, $order, $category_id, $minPrice, $maxPrice)->fetch_all();

        $productFileModel = $this->model("ProductFileModel");

        $productFile = $productFileModel->getAllProductFile()->fetch_all();

        $categoryModel = $this->model("CategoryModel");

        $category = $categoryModel->getCategory()->fetch_all();
        $data = [
            "product" => $product,
            "productFile" => $productFile,
            "category" => $category
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

?>