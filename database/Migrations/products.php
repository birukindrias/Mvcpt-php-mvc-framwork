<?php
use App\config\App;

class products{
    public function up()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS  products (
                  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                  username VARCHAR(50),
                  pimg VARCHAR(50),
                  email VARCHAR(50),
                  password VARCHAR(50)
       )
       ENGINE = INNODB;";
        App::$app->database->pdo->exec($SQL_QUERY);
        App::$app->database->log("productss Table Created");

    }
    public function down()
    {
       $SQL_QUERY = "DROP TABLE IF EXISTS  products;";
       App::$app->database->log("Droping products");
       App::$app->database->pdo->exec($SQL_QUERY);
    }
}
