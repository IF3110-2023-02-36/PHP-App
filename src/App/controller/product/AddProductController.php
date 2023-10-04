<?php

class AddProductController extends Controller{

    public function index(){
        $data = []; // TODO : get data kategori dulu

        $dir = __DIR__;
        $dir = explode("/", $dir);
        $folderName = end($dir);
        $className = get_class();
        $fileName = str_replace('Controller', '', $className);
        $view = $this->view($folderName, $fileName, $data);

        $view->render();
    }

    public function post(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $product_name = $_POST["product_name"];
            $product_price = $_POST["product_price"];
            $product_description = $_POST["product_description"];
            $product_stock = $_POST["product_stock"];
            
            $productModel = $this->model("ProductModel");

            $productModel->addProduct(1, $product_name, $product_description, $product_price, $product_stock);

            // Dapatkan informasi tentang file yang diunggah
            $file_name = $_FILES["product_image"]["name"];
            $file_temp = $_FILES["product_image"]["tmp_name"];
            $file_size = $_FILES["product_image"]["size"];
            $file_error = $_FILES["product_image"]["error"];
            
            // Periksa apakah file yang diunggah adalah gambar
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");

            if (in_array($file_extension, $allowed_extensions)) {
                if ($file_error === 0) {
                    // Tentukan lokasi penyimpanan file yang diunggah
                    $upload_directory = __DIR__. "./../../public/image/";

                    if (!is_dir($upload_directory)) {
                        // The directory doesn't exist, create it
                        mkdir($upload_directory, 0755, true);
                    }

                    // Generate a unique filename using uniqid() and the original file extension
                    $unique_filename = uniqid() . '.' . $file_extension;

                    // Set the complete path to the uploaded file
                    $target_path = $upload_directory . $unique_filename;

                    echo $target_path;

                    // Pindahkan file yang diunggah ke lokasi penyimpanan
                    if (move_uploaded_file($file_temp, $target_path)) {
                        // File berhasil diunggah dan disimpan
                        echo "File berhasil diunggah.";
                        // Now, you can store the $unique_filename in your database for reference.
                    } else {
                        // Terjadi kesalahan saat mengunggah file
                        echo "Terjadi kesalahan saat mengunggah file.";
                    }
                }
            }
        }
    }
}

