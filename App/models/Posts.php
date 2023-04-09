<?php
namespace App\App\models;

use App\config\Model;
class Posts extends Model 
{
  

    public static function tableName(): string
    {
        return "Postss";
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
