<?php
require_once ("database.php");
require_once("./controller/Controller.php");
require_once ("./controller/ProductController.php");
// require_once ("./models/ProductModel.php");
// require_once ("./views/home/HomePageView.php");
// $db = new Database();
// require_once ("components/home/home.php");

$controller = new ProductController();
$controller->index();