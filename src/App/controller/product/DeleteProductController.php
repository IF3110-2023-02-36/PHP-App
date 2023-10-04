<?php 

class deleteProductController extends Controller{
    public function post(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            throw new Exception('Method not allowed', 405);
        }
        $id = $_POST["product_id"];
        $productModel = $this->model("ProductModel")->deleteProduct($id);
    }
}