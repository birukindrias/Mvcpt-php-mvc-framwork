<?php
include_once "../vendor/autoload.php";

use App\App\Http\Controllers\AuthController;
use App\config\App;
use App\config\View;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
// var_dump($_ENV)p.en;
$db_config = [

    'DNS' => $_ENV['DB_DNS'],
    'USER' => $_ENV['DB_USER'],
    'PASS' => $_ENV['DB_PASS'],
];
// echo "<pre>";   
$app = new App($db_config);

$app->run();