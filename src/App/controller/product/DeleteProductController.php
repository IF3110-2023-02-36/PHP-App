<?php 

class DeleteProductController extends Controller{
    public function post($id){
        if($this->userRole !== 2) {
            throw new Exception("You are not allowed to view this page", 405);
        }
        
        $productModel = $this->model("ProductModel");
        $productModel->deleteProduct($id);
        header("location: /");
    }
}