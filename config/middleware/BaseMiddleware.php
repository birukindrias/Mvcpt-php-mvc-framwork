<?php


namespace App\config\middleware;


abstract class BaseMiddleware
{
    abstract public function execute();
}