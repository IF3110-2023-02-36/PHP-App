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
        
        $pict_name = $_FILES["product_image"]["name"];
        $pict_temp = $_FILES["product_image"]["tmp_name"];
        $pict_size = $_FILES["product_image"]["size"];
        $pict_error = $_FILES["product_image"]["error"];

        // echo "a".$pict_name;
        // echo "a".$pict_temp;
        // echo "a".$pict_size;
        // echo "a".$pict_error;
        
        $vid_name = $_FILES["product_video"]["name"];
        $vid_temp = $_FILES["product_video"]["tmp_name"];
        $vid_size = $_FILES["product_video"]["size"];
        $vid_error = $_FILES["product_video"]["error"];

        $pict_extension = strtolower(pathinfo($pict_name, PATHINFO_EXTENSION));
        $vid_extension = strtolower(pathinfo($vid_name, PATHINFO_EXTENSION));

        $allowed_extensions = array("jpg", "jpeg", "png", "gif", "mp4", "mkv");
        
        $succesFile = false;
        if($pict_error === 4){
            $pict_extension = "jpg";
        }
        if (in_array($pict_extension, $allowed_extensions) ) {
            if ($pict_error === 0) {
                $uploadPict_directory = __DIR__ . "/../../public/storage/image/";

                $uploadVid_directory = __DIR__ . "/../../public/storage/video/";

                if (!is_dir($uploadPict_directory)) {
                    mkdir($uploadPict_directory, 0755, true);
                }

                if (!is_dir($uploadVid_directory)) {
                    mkdir($uploadVid_directory, 0755, true);
                }

                $uniquePict_filename = uniqid() . '.' . $pict_extension;

                $target_path = $uploadPict_directory . $uniquePict_filename;

                $executeOk = move_uploaded_file($pict_temp, $target_path);

                if (!$executeOk) {
                    throw new Exception('File upload failed', 400);
                } 

                //insert pict
                $succesInsert = $productModel->addProduct($product_category, $product_name, $product_description, $product_price, $product_stock);
                
                $product_id = $productModel->getProductByName($product_name)->fetch_assoc();

                $product_pict_model = $this->model("ProductFileModel");

                $executeOkDb = $product_pict_model->addProductFile($product_id['id'], $uniquePict_filename, $pict_extension);

                //insert video 
                if($vid_error === 0 && in_array($vid_extension, $allowed_extensions)){
                    $uniqueVid_filename = uniqid() . '.' . $vid_extension;

                    $target_path = $uploadVid_directory . $uniqueVid_filename;

                    $executeOk = move_uploaded_file($vid_temp, $target_path);

                    if (!$executeOk) {
                        throw new Exception('File upload failed', 400);
                    }                 
    
                    $product_vid_model = $this->model("ProductFileModel");
    
                    $executeOkDb = $product_vid_model->addProductFile($product_id['id'], $uniqueVid_filename, $vid_extension);
                }
                
                if (!$executeOkDb || !$succesInsert) {
                    throw new Exception('Database insertion failed', 400);
                }
                $succesFile = true;
            }
                
            if($pict_error === 4){
                $succesInsert = $productModel->addProduct($product_category, $product_name, $product_description, $product_price, $product_stock);
                
                $product_id = $productModel->getProductByName($product_name)->fetch_assoc();
                $product_pict_model = $this->model("ProductFileModel");
                
                $executeOkDb = $product_pict_model->addProductFile($product_id['id'], "default.jpg", "jpg");
                
                if (!$executeOkDb || !$succesInsert) {
                    throw new Exception('Database insertion failed', 400);
                }
                $succesFile = true;
            }
            
            
        }

        if($succesFile && $succesInsert){
            header("Location: /ManageProduct");
        }
    }
}

