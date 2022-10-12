<?php
include_once dirname(__DIR__) . "/../vendor/autoload.php";

use App\config\App;

$path = dirname(__DIR__).'/../';
$dotenv = Dotenv\Dotenv::createImmutable($path);
$dotenv->load();

$db_config = [

    'DNS' => $_ENV['DNS'],
    'USER' => $_ENV['USER_NAME'],
    'PASS' => $_ENV['PASS'],
];
$app = new App($db_config);

$app::$app->database->applyMigrations();
exit;