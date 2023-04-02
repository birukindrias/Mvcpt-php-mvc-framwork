<?php

namespace App\config;

class Response
{
    public function redirect($link)
    {
        return  header('location: ' . $link);
    }
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
}
