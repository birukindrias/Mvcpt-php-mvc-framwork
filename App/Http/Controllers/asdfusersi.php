
<?php
namespace App\App\Http\Controllers;

use App\App\models\Users;
use App\config\App;
use App\config\Controller;
class asdfusersi extends Controller
{
    public function asdfusersi()
    {
       $title = "asdfusersi";
       return $this->render("asdfusersi"); 
      
    }
  
    public  function create()
    {
      return ;

    }
      public  function store()
    {
        if (App::$app->request->is_Post()) {
            // var_dump(App::$app->request->reqData());
            $data = App::$app->request->reqData();
            $user = new Users();

            $user->loadData($data);
            // var_dump($data);
            $user->validate();
            $user->save();
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

