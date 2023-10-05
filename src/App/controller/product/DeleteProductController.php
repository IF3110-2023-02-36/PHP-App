<?php 

class DeleteProductController extends Controller{
    public function post($id){
        $productModel = $this->model("ProductModel");
        $productModel->deleteProduct($id);
        header("location: /ManageProduct");
    }
}