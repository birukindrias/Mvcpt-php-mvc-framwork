<?php

namespace App\App\middleware;


use App\config\App;
use App\App\Exceptions\ForbiddenException;
use App\config\middleware\BaseMiddleware;

/**
 * Class AuthMiddleware
 *
 * @author  birukindrias
 */
class AuthMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (App::$app->isGuest()) {
            if (in_array(App::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
                
            }
        }
    }
}