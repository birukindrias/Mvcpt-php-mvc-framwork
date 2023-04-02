<?php
use App\config\App;

class ab{
    public function up()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS  ab (
                  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                  username VARCHAR(50),
                  pimg VARCHAR(50),
                  email VARCHAR(50),
                  password VARCHAR(50)
       )
       ENGINE = INNODB;";
        App::$app->database->pdo->exec($SQL_QUERY);
        App::$app->database->log("ab Table Created");

    }
    public function down()
    {
       $SQL_QUERY = "DROP TABLE IF EXISTS  ab;";
       App::$app->database->log("Droping ab");
       App::$app->database->pdo->exec($SQL_QUERY);
    }
}
