<?php

namespace App\config;

use PDO;

class Database
{

  public \PDO $pdo;
  public array $migrationsArray = [];
  public function __construct($db_config)
  {

    $user = $db_config['USER'];
    $pass = $db_config['PASS'];
    $dns =$db_config['DNS'] ;
    $this->pdo = new PDO($dns, $user, $pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function applyMigrations()
  {
    $writtenMigration = scandir(dirname(__DIR__) . '/database/Migrations/');
    $this->create_table_migrations();
    $migrations = array_diff($writtenMigration, $this->existingMigrations());
    foreach ($migrations as $key => $value) {
      if ($value == '.' || $value == '..') {
        continue;
      }
      $migrationName = pathinfo($value, PATHINFO_FILENAME);
      require_once
        dirname(__DIR__) . "/database/Migrations/" . $value;
      $migrationClassName = new $migrationName;
      $migrationClassName->up();
      $this->migrationsArray[] = $value;

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

  private function log($message)
  {
    echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
  }
}