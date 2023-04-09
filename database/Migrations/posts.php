<?php
use App\config\App;

class posts{
    public function up()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS  posts (
                  pid INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                  post_body VARCHAR(50),
                  post_img VARCHAR(50) ,
                  password VARCHAR(50)
       )
       ENGINE = INNODB;";
        App::$app->database->pdo->exec($SQL_QUERY);
        App::$app->database->log("postss Table Created");

    }
    public function down()
    {
       $SQL_QUERY = "DROP TABLE IF EXISTS  posts;";
       App::$app->database->log("Droping posts");
       App::$app->database->pdo->exec($SQL_QUERY);
    }
}
