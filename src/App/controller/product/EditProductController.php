<?php

class EditProductController extends Controller{

    public function index($id){
        $productModel = $this->model("ProductModel");

        $data_product = $productModel->getProductById($id)->fetch_assoc();

        $categoryModel = $this->model("CategoryModel");

        $data_category = $categoryModel->getCategory()->fetch_all();

        $productFileModel = $this->model("ProductFileModel");

        $product_file = $productFileModel->getProductFile($data_product['id'])->fetch_all();

        $data = [
            'data_product' => $data_product,
            'data_category' => $data_category,
            'productFile' => $product_file
        ];

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }

    public function post($id){
        $product_name = $_POST["product_name"];
        $product_category = $_POST["product_category"];
        $product_price = $_POST["product_price"];
        $product_description = $_POST["product_description"];
        $product_stock = $_POST["product_stock"];
        
        $pict_name = $_FILES["product_image"]["name"];
        $pict_temp = $_FILES["product_image"]["tmp_name"];
        $pict_size = $_FILES["product_image"]["size"];
        $pict_error = $_FILES["product_image"]["error"];
        
        $vid_name = $_FILES["product_video"]["name"];
        $vid_temp = $_FILES["product_video"]["tmp_name"];
        $vid_size = $_FILES["product_video"]["size"];
        $vid_error = $_FILES["product_video"]["error"];

        
        $vid_extension = strtolower(pathinfo($vid_name, PATHINFO_EXTENSION));

        $allowed_extensions = array("jpg", "jpeg", "png", "gif", "mp4", "mkv");

        if($pict_error === 0){
            $pict_extension = strtolower(pathinfo($pict_name, PATHINFO_EXTENSION));
            if(in_array($pict_extension, $allowed_extensions)){
                $uploadPict_directory = __DIR__ . "/../../public/storage/image/";

                if (!is_dir($uploadPict_directory)) {
                    mkdir($uploadPict_directory, 0755, true);
                }

                $uniquePict_filename = uniqid() . '.' . $pict_extension;

                $target_path = $uploadPict_directory . $uniquePict_filename;

                $executeOk = move_uploaded_file($pict_temp, $target_path);

                if (!$executeOk) {
                    throw new Exception('File upload failed', 400);
                } 

                $product_file_model = $this->model("ProductFileModel");

                $product_file = $product_file_model->getProductFile($id)->fetch_all();

                $succesInsert = $product_file_model->editProductFile($product_file[0][0], $uniquePict_filename, $pict_extension);

                if(!$succesInsert){
                    throw new Exception('Database insertion failed', 400);
                }
            }
        }
        if($vid_error === 0){
            $vid_extension = strtolower(pathinfo($vid_name, PATHINFO_EXTENSION));
            if(in_array($vid_extension, $allowed_extensions)){
                $uploadVid_directory = __DIR__ . "/../../public/storage/video/";

                if (!is_dir($uploadVid_directory)) {
                    mkdir($uploadVid_directory, 0755, true);
                }

                $uniqueVid_filename = uniqid() . '.' . $vid_extension;

                $target_path = $uploadVid_directory . $uniqueVid_filename;

                $executeOk = move_uploaded_file($vid_temp, $target_path);

                if (!$executeOk) {
                    throw new Exception('File upload failed', 400);
                } 

                $product_file_model = $this->model("ProductFileModel");

                $product_file = $product_file_model->getProductFile($id)->fetch_all();
                
                if(sizeof($product_file) > 1){
                    $succesInsert = $product_file_model->editProductFile($product_file[1][0], $uniqueVid_filename, $vid_extension);
                }else{
                    $succesInsert = $product_file_model->addProductFile($id, $uniqueVid_filename, $vid_extension);
                }

                if(!$succesInsert){
                    throw new Exception('Database insertion failed', 400);
                }
            }
        }
        $productModel = $this->model("ProductModel");

        $succesUpdate = $productModel->updateProduct($id, $product_category, $product_name, $product_description, $product_price, $product_stock);
        if(!$succesUpdate){
            throw new Exception("error updating product", 400);
        }
        header("Location: /");
        
    }
}