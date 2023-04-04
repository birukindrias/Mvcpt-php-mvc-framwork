
<?php
namespace App\App\models;

use App\config\Model;
class Produccontr extends Model 
{
  

    public static function tableName(): string
    {
        return "Produccontrs";
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
