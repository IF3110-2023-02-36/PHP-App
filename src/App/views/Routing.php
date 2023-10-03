<?php

class Routing {
    protected $controller;

    public function __construct() {
        // sementara defaultnya ke home
        $controllerDir = __DIR__ . '/../controller';
        require_once $controllerDir . '/HomeController.php';
        $this->controller = new HomeController();

        $url = $this->parseURL();
        if($url != NULL) {
            $ucURL = ucfirst($url);
            $controllerName = $ucURL . "Controller";
            $controllerFile = $controllerDir . '/' . $controllerName . '.php';
            if(!file_exists($controllerFile)) {
                $controllerName = "NotFoundController";
                $controllerFile = $controllerDir . '/' . $controllerName . '.php';
            }
            require_once $controllerFile;
            $this->controller = new $controllerName();
        }

        $this->controller->index();
    }

    private function parseURL() {
        if (isset($_SERVER['PATH_INFO'])) {
            $url = trim($_SERVER['PATH_INFO'], '/');
            $url = trim($url, '.php');
            return $url;
        }
    }
}
