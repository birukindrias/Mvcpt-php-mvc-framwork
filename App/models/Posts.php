<?php
namespace App\App\models;

use App\config\Model;
class Posts extends Model 
{
    public string $user_id = '';
    public string $body = '';
    public string $post_img = '';
  

    public static function tableName(): string
    {
        return "posts";
    }
    public function rules(): array
    {
        return [
            'user_id' => [self::RULE_REQUIRED],
        ];
    }
    public function attrs(): array
    {
        return [
           'user_id',
           'body',
           'post_img'

        ];
    }
      
}
