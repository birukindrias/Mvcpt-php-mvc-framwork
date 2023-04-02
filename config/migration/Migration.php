<?php
include_once dirname(__DIR__) . "/../vendor/autoload.php";

use App\config\App;

$path = dirname(__DIR__).'/../';
// var_dump(__DIR__);
$dotenv = Dotenv\Dotenv::createImmutable($path);
$dotenv->load();
# DB_DNS = mysql:host=localhost;dbname=gro;
# DB_USER = bix
# DB_PASS = root
$db_config = [

    'DNS' => $_ENV['DB_DNS'],
    'USER' => $_ENV['DB_USER'],
    'PASS' => $_ENV['DB_PASS'],
];
$app = new App($db_config);

$app::$app->database->applyMigrations($upd);
exit;