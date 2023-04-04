# PHPMVC Framwork


![alt mvcpt](https://github.com/birukindrias/Mvcpt-php-mvc-framwork/blob/main/storage/2.png)
![alt mvcpt](https://github.com/birukindrias/Mvcpt-php-mvc-framwork/blob/main/storage/5.png)
![alt mvcpt](https://github.com/birukindrias/Mvcpt-php-mvc-framwork/blob/main/storage/7.png)
![alt mvcpt](https://github.com/birukindrias/Mvcpt-php-mvc-framwork/blob/main/storage/8.png)


:fast_forward:  ecommerce website built on top of  PHP mvc framwork which build to make developement fast it includes migrations routing styling with tailwindcss,bultin php cli and other functionality it also come with built in login and sign up functionality.the app include product slling and adding to cart search functionalites.

# Start Project
#<code>php run</code> 

# Run Migrations
```php run migrate
```

# Run Drop Migrations 
```
php run migrate:refresh

```

# Add Migration Classes in database/Migrations 
```
<?php

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
```


