<?php namespace Exchangify\core\router;

class RouterService
{
    private $routes;
    private $request;
    private $method;

    public function __construct($request, $method)
    {
        $this->routes = [];
        $this->request = $request;
        $this->method = $method;
    }

    public function subscribe($name, $method, $controller)
    {
        $route = new Route();
        $route->name = $name;
        $route->method = $method;
        $route->controller = $controller;

        array_push($this->routes, $route);
    }

    public function notify()
    {
        foreach ($this->routes as $route) {
            if ($route->name === implode('/', $this->request) && $route->method === $this->method)
                return new $route->controller;
        }

        header("HTTP/1.0 404 Not Found");
    }
}