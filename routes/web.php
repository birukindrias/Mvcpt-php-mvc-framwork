<?php

use App\App\Http\Controllers\AuthController;
use App\App\Http\Controllers\Controller;
use App\App\Http\Controllers\Products\ProductsController;
use App\App\Http\Controllers\UserController;
use App\config\App;

$route = App::$app->router;
//Auth
$route->post('/register', [AuthController::class, 'register']);
$route->get('/register', [AuthController::class, 'register']);
$route->post('/login', [AuthController::class, 'login']);
$route->get('/login', [AuthController::class, 'login']);
$route->get('/logout', [AuthController::class, 'logOut']);
// users
$route->get('/profile', [Controller::class, 'profile']);
$route->post('/profile', [Controller::class, 'profile']);
$route->post('/search', [UserController::class, 'serch_item']);
$route->get('/home', [Controller::class, 'dashboard']);
$route->get('/', [Controller::class, 'index']);
// products
$route->post('/create', [ProductsController::class, 'store']);
$route->get('/create', [ProductsController::class, 'create']);
