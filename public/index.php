<?php
include_once "../vendor/autoload.php";

use App\App\Http\Controllers\AuthController;
use App\config\App;
use App\config\View;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$db_config = [

    'DNS' => $_ENV['DNS'],
    'USER' => $_ENV['USER'],
    'PASS' => $_ENV['PASS'],
];
// echo "<pre>";   
$app = new App($db_config);

$app->run();