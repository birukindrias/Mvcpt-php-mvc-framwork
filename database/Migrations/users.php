<?php
// namespace App\database\Migrations;

use App\config\App;

class  users01
{
    public function up()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            username VARCHAR(50),
            email VARCHAR(50),
            password VARCHAR(50),
            image VARCHAR(50) NULL)



 ENGINE = INNODB;";
        App::$app->database->pdo->exec($sql);
    }
}