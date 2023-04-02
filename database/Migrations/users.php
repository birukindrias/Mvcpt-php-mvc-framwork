<?php
// namespace App\database\Migrations;

use App\config\App;

class  users
{
    public function up()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            username VARCHAR(50),
            email VARCHAR(50),
            password VARCHAR(50),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            image VARCHAR(50))
 ENGINE = INNODB;";
        App::$app->database->pdo->exec($sql);
        App::$app->database->log("users Table Created");
    }
    public function down()
    {
        $SQL_QUERY = "DROP TABLE IF EXISTS  users;";
        App::$app->database->log("users Droped");
        App::$app->database->pdo->exec($SQL_QUERY);
    }
}
