<?php
$fileinfo =  '<?php
namespace App\App\models;

use App\config\Model;
class ' . ucfirst($filename) . ' extends Model 
{
  

    public static function tableName(): string
    {
        return "' . $filename . 's";
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
';
$viewInfo =
    '<title>
   <?php echo $title ?>
</title>
<?php echo $th->code ?>
';
