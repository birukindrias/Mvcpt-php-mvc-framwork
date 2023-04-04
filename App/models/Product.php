
<?php
namespace App\App\models;

use App\config\Model;
class Product extends Model 
{
  

    public static function tableName(): string
    {
        return "Products";
    }
    public function rules(): array
    {
        return [
          "key"=>"val"
        ];
    }
    public function attrs(): array
    {
        return [
           

        ];
    }
      
}
