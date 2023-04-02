<?php
$fileinfo = '
<?php
namespace App\App\Http\Controllers;

use App\App\models\Users;
use App\config\App;
use App\config\Controller;
class ' . $filename . ' extends Controller
{
    public function ' . $filename . '()
    {
       $title = "' . $filename . '";
       return $this->render("' . $filename . '"); 
      
    }
  
    public  function create()
    {
      return ;

    }
      public  function insert()
    {
        if (App::$app->request->is_Post()) {
            // var_dump(App::$app->request->getBody());
            $DATA = App::$app->request->reqData();
            $USER = new Users();

            $USER->loadData($DATA);
            // var_dump($DATA);
            $USER->validate();
            $USER->save();
            return;
        }

      
    }
    public  function update()
    {
      return ;

    }
    public  function edit()
    {
      return ;

    }
    public  function delete()
    {
      return ;

    }
}

';
