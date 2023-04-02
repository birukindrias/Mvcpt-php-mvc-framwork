<?php

namespace App\config;

use PDO;

class Database
{

    public \PDO $pdo;
    public array $migrationsArray = [];
    public function __construct($db_config)
    {


        try {
            $user = $db_config['USER'];
            $pass = $db_config['PASS'];
            $dns = $db_config['DNS'];
            $this->pdo = new PDO($dns, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            echo '<div style="background-color:white; color:red">'.$th->getMessage()."</div>";
        }
    }

    public function applyMigrations($upd)
    {
        $writtenMigration = scandir(dirname(__DIR__) . '/database/Migrations/');
        $this->create_table_migrations();
        $migrations = array_diff($writtenMigration, $this->existingMigrations());
        if ($upd == 'down') {
            foreach ($migrations  as $migration_name) {
            if ($migration_name == '.' || $migration_name == '..') {
              continue;
            }
         
            require_once dirname(__DIR__) . "/database/Migrations/$migration_name";
            $CLASS_NAMES = pathinfo($migration_name, PATHINFO_FILENAME);
            $CLASS = new $CLASS_NAMES;
      
            $CLASS->down();
         
              }
              $SQL_QUERY = "DROP TABLE IF EXISTS  migrations";
              App::$app->database->pdo->exec($SQL_QUERY);
              return true;
          }
          foreach ($migrations as $migration_name) {
            if ($migration_name == '.' || $migration_name == '..') {
              continue;
            }
            require_once dirname(__DIR__). "/database/Migrations/$migration_name";
            $CLASS_NAMES = pathinfo($migration_name, PATHINFO_FILENAME);
            $CLASS = new $CLASS_NAMES;
            $CLASS->$upd();
            $this->migrationsArray[] = $migration_name;
          }
       
        if (!empty($this->migrationsArray)) {
            $this->saveMigrations($this->migrationsArray);
            $this->log('MIGRATIONS APPLIED SUCCESSFULLY!');
        } else {
            $this->log('NOTHING TO MIGRATE!');
        }
    }


    public function create_table_migrations()
    {
        $SQL_QUERY = "CREATE TABLE IF NOT EXISTS migrations (
                    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                    migration_name VARCHAR(50)
         )
         ENGINE = INNODB;";
        $this->pdo->exec($SQL_QUERY);
    }
    public function existingMigrations()
    {
        $SQL_QUERY = "SELECT migration_name FROM migrations";
        $PDO_STMT = $this->pdo->prepare($SQL_QUERY);
        $PDO_STMT->execute();
        return $PDO_STMT->fetchAll(\PDO::FETCH_COLUMN);
    }
    public function saveMigrations($migrations)
    {
        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration_name)
              VALUES $str");
        $statement->execute();
    }
    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    public function log($message)
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }
}
