<?php

namespace App\config;

use App\App\Exceptions\notFoundException;

class Router
{
    public Request $request;
    public function __construct()
    {
        $this->request = new Request();
    }
    public function get($route, $callback)
    {
        $this->routes['get'][$route] = $callback;
    }
    public function post($route, $callback)
    {
        $this->routes['post'][$route] = $callback;
    }
    public function resolve()
    {
        include_once __DIR__ . "/../routes/web.php";
        include_once __DIR__ . "/../routes/api.php";
        $callback = $this->routes[$this->request->urlMethod()][$this->request->urlPath()] ?? false;



        if ($callback == false) {
            throw new notFoundException();
        } else {
            /**
             * @var \App\kernel\Controller $controller
             */
            $controller = new $callback[0]();
            $callback[0] = $controller;
            $controller = new $callback[0]();
            $controller->action = $callback[1];
            $middlewares = $controller->getMiddlewares();
            App::$app->controller = $controller;
            foreach ($middlewares as $middleware) {
                $middleware->execute();
            }
            return call_user_func($callback);
        }
    }
}