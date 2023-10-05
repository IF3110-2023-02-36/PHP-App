<?php

// automatic routing
$componentDir = __DIR__ . '/../controller';
$folders = scandir($componentDir);
unset($folders[0]);
unset($folders[1]);
$routes = array();
foreach ($folders as $folderName) {
    $folderDir = $componentDir . "/$folderName";
    if($folderName === "Controller.php") continue;
    $files = scandir($folderDir);
    unset($files[0]);
    unset($files[1]);
    foreach ($files as $file) {
        $fileName = str_replace('Controller.php', '', $file);
        $routes[$fileName] = $folderName;
    }
}

// manual routing
// routes mapping filename -> folder
// $routes = array(
//     'AddCart' => "cart",
//     'Cart' => "cart",
//     'Home' => "home",
//     'NotFound' => "home",
//     'Login' => "login",
//     'Logout' => "login",
//     'Register' => "login",
//     'Manage' => "manage",
//     'ManageProduct' => "manage",
//     'AddProduct' => "product",
//     'Product' => "product",
//     'EditProduct' => "product",
//     'Category' => "category",
//     'AddCategory' => "category",
//     'EditCategory' => "category",
//     'DeleteCategory' => "category",
//     'Profile' => "profile",
//     'Search' => "search",
// );

