<?php 

class DeleteProductController extends Controller{
    public function post(){
        $id = $_POST["product_id"];
        $productModel = $this->model("ProductModel");
        $productModel->deleteProduct($id);
    }
}