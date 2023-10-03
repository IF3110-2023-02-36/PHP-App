<?php

class Routing {
    protected $controller;

    public function __construct() {
        // sementara defaultnya ke home
        $controllerDir = __DIR__ . '/../controller';
        require_once $controllerDir . '/HomePageController.php';
        $this->controller = new HomePageController();

        $url = $this->parseURL();
        if($url != NULL) {
            $ucURL = ucfirst($url);
            require_once $controllerDir . '/' . $ucURL . 'PageController.php';
            $controllerName = $ucURL . "PageController";
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
