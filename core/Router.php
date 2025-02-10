<?php
class Router
{
    private $routes = [];

    public function add($route, $action, $method = 'GET')
    {
        $this->routes[strtoupper($method)][$route] = $action;
    }

    public function dispatch($url, $requestMethod)
    {
        $method = strtoupper($requestMethod);

        if (isset($this->routes[$method][$url])) {
            $action = $this->routes[$method][$url];

            // Check if the action is a Closure (anonymous function)
            if ($action instanceof Closure) {
                // Execute the Closure
                call_user_func($action);
            } else {
                // Handle string-based routes (Controller@method)
                [$controllerName, $methodName] = explode('@', $action);
                require_once __DIR__ . "/../app/controllers/$controllerName.php";
                $controller = new $controllerName();
                $controller->$methodName();
            }
        } else {
            echo "404 - Page Not Found";
        }
    }
}
