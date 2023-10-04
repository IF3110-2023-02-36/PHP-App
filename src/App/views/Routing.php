<?php

class Routing {
    protected $controller;
    protected $method;

    public function __construct() {
        // sementara defaultnya ke home
        $controllerDir = __DIR__ . '/../controller';
        require_once $controllerDir . '/HomeController.php';
        $this->controller = new HomeController();
        $method = "index";
        
        $url = $this->parseURL();

        if($url != NULL) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $method = "post";
            }

            $filename = trim($url[1], '.php');
            $filename = ucfirst($filename);
            $controllerName = $filename . "Controller";
            $controllerFile = $controllerDir . '/' . $controllerName . '.php';
            if(!file_exists($controllerFile)) {
                $controllerName = "NotFoundController";
                $controllerFile = $controllerDir . '/' . $controllerName . '.php';
            }
            require_once $controllerFile;
            $this->controller = new $controllerName();
        }
        $this->controller->$method();
    }

    private function parseURL() {
        if (isset($_SERVER['PATH_INFO'])) {
            $url = explode('/', $_SERVER['PATH_INFO']);
            return $url;
        }
    }
}
