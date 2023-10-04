<?php


class Routing {
    protected $controller;
    protected $method;

    public function __construct() {
        require_once __DIR__ . "/Routes.php";

        // sementara defaultnya ke home
        $controllerDir = __DIR__ . '/../controller';
        require_once $controllerDir . '/home/HomeController.php';
        $this->controller = new HomeController();
        $method = "index";

        $url = $this->parseURL();

        if($url != NULL) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $method = "post";
            }

            $filename = str_replace('.php', '', $url[1]);
            $filename = ucfirst($filename);
            $controllerName = $filename . "Controller";
            $controllerFile = $controllerDir . '/' . $routes[$filename] . '/' . $controllerName . '.php';
            if(!file_exists($controllerFile)) {
                $controllerName = "NotFoundController";
                $controllerFile = $controllerDir . '/home/' . $controllerName . '.php';
            }
            require_once $controllerFile;
            $this->controller = new $controllerName();
        }

        if($url != NULL && count($url) > 2) {
            $this->controller->$method($url[2]);
        }else {
            $this->controller->$method();
        }
    }

    private function parseURL() {
        if (isset($_SERVER['PATH_INFO'])) {
            $url = explode('/', $_SERVER['PATH_INFO']);
            return $url;
        }
    }
}
