<?php
class Router {
    private $routes = [];

    public function add($url, $controller, $method) {
        $this->routes[$url] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch($url) {
        $url = trim($url, '/');
        $urlParts = explode('/', $url);
        
        $controllerName = isset($urlParts[0]) && $urlParts[0] != '' ? ucfirst($urlParts[0]) . 'Controller' : 'DashboardController';
        $methodName = isset($urlParts[1]) ? $urlParts[1] : 'index';
        $params = array_slice($urlParts, 2);

        $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], $params);
            } else {
                http_response_code(404);
                echo "Method not found";
            }
        } else {
            http_response_code(404);
            echo "Controller not found";
        }
    }
}
