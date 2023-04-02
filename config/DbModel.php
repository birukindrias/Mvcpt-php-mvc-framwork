<?php

namespace App\config;

use App\config\Database;

abstract class DbModel
{

    abstract public function attrs(): array;
    abstract public static function tableName(): string;
    public function save()
    {
        $tableName = $this->tableName();
        $array_key = $this->attrs();
        $input_keys = array_map(fn ($key) => ":$key", $array_key);
        $sql = "INSERT $tableName (" .  implode(',', $this->attrs()) . ") VALUES (" .  implode(',', $input_keys) . ")";
        ($sql);
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($this->attrs() as $key) {
            $stmt->bindValue(":$key", $this->{$key});
        }
        $stmt->execute();
        return true;
        
    }
    public  static function get(array $keys)
    {
        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $input_keys = implode(' AND ', array_map(fn ($key) => "$key = :$key", $array_key));
        $sql = "SELECT * FROM $table_name WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($keys as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        $foundItem = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $foundItem;
    }

    public  static function getUser(array $keys)
    {
        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $input_keys = implode(' AND ', array_map(fn ($key) => "$key = :$key", $array_key));
        echo "<pre>";
        ($input_keys);
        $input_keys = array_map(fn ($key) => "$key = :$key", $array_key);
        $sql = "SELECT * FROM $table_name WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($keys as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        //   (pdo_error(App::$kernel->databa->pdo));
        $foundItem = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $foundItem;
    }

    public function getAll()
    {
        $table_name = static::tableName();
        $sql = "SELECT * FROM $table_name";
        $stmt = App::$app->database->pdo->prepare($sql);
        // foreach ($this->attrs() as $key => $value) {
        //     $stmt->bindValue(":$key", $value);
        // }
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_reverse($data);
    }
    public function geti($get, $whr)
    {
        $table_name = static::tableName();
        ($table_name);
        echo "SELECT $get FROM   $table_name where $whr[0] = $whr[1] ";
        $data = App::$app->database->prepare("SELECT $get FROM   $table_name where $whr[0] = $whr[1] ");
        $data->execute();
        ($data->fetchAll());
        return    $data->fetch();
    }
    public function update(array $keys, array $values)
    {

        $ar = array_merge($values,    $keys);

        $table_name = static::tableName();
        $array_key = array_keys($keys);
        $array_keya = array_keys($values);
        $input_keys = implode(',', array_map(fn ($key) => "$key = :$key", $array_key));
        $input_values = implode(',', array_map(fn ($key) => "$key = :$key", $array_keya));
        $sql = "UPDATE  $table_name SET $input_values WHERE $input_keys";
        $stmt = App::$app->database->pdo->prepare($sql);
        foreach ($ar as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if (
            $stmt->execute()

        ) {
            return true;
        };

        return false;
    }
    public  static function search(array $thisarrayok)
    {
        // var_dump($thisarrayok);
        // var_dump($thisarrayok);

        $table_name = static::tableName();
        $array_key = array_keys($thisarrayok);
        $input_keys = implode(' AND ', array_map(fn ($key) => "  $key Like :$key", $array_key));

        // $input_keys = array_map(fn ($key) => "$key = :$key", $array_key);
        $SQL_QUERY = "SELECT * FROM $table_name WHERE  $input_keys";
        $QUERY_STMT = App::$app->database->pdo->prepare($SQL_QUERY);
        // var_dump('QUERY_STMT');
        // var_dump($QUERY_STMT);

        foreach ($thisarrayok as $key => $value) {
            $QUERY_STMT->bindValue(":$key", '%' . $value . '%');
        }

        $QUERY_STMT->execute();
        // var_dump(pdo_error(App::$ap->db->pdo));

        $retu = $QUERY_STMT->fetchAll(\PDO::FETCH_ASSOC);

        if (!empty ($retu)) {
        // var_dump('QUERY_STMT');
        return $retu;

            // var_dump($retu);
        }else{
            return 'no match found';
        }
    }
    public function where()
    {
        // $sql = $this->geti();
    }
}
