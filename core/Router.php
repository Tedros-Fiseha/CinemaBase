<?php
class Router {
    private $routes = [];

    public function add($route, $action) {
        $this->routes[$route] = $action;
    }

    public function dispatch($url) {
        if (array_key_exists($url, $this->routes)) {
            [$controllerName, $methodName] = explode('@', $this->routes[$url]);
            require_once __DIR__ . "/../app/controllers/$controllerName.php";
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            echo "404 - Page Not Found";
        }
    }
}
?>