<?php

namespace App\config;

use App\App\middleware\AuthMiddleware;
use App\config\middleware\BaseMiddleware as MiddlewareBaseMiddleware;

class Controller extends View
{
    
    public string $action = '';
    protected array $middlewares = [];
    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['profile']));

    }


    public function registerMiddleware(MiddlewareBaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}