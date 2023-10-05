<?php

class AddProductController extends Controller{

    public function index(){
        $categoryModel = $this->model("CategoryModel");

        $data = $categoryModel->getCategory()->fetch_all();

        // print_r($data);
        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }

    public function post(){

        $product_name = $_POST["product_name"];
        $product_category = $_POST["product_category"];
        $product_price = $_POST["product_price"];
        $product_description = $_POST["product_description"];
        $product_stock = $_POST["product_stock"];
        
        $productModel = $this->model("ProductModel");

        $succesInsert = $productModel->addProduct($product_category, $product_name, $product_description, $product_price, $product_stock);

        $file_name = $_FILES["product_image"]["name"];
        $file_temp = $_FILES["product_image"]["tmp_name"];
        $file_size = $_FILES["product_image"]["size"];
        $file_error = $_FILES["product_image"]["error"];
        
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        $succesFile = false;
        if (in_array($file_extension, $allowed_extensions)) {
            if ($file_error === 0) {
                $upload_directory = __DIR__ . "/../../public/storage/image/";

                if (!is_dir($upload_directory)) {
                    mkdir($upload_directory, 0755, true);
                }

                $unique_filename = uniqid() . '.' . $file_extension;

                $target_path = $upload_directory . $unique_filename;

                $executeOk = move_uploaded_file($file_temp, $target_path);

                if (!$executeOk) {
                    throw new Exception('File upload failed', 400);
                }
                else{
                    $succesFile = true;
                }
            }
        }
        if($succesFile && $succesInsert){
            header("Location: /");
        }
    }
}

