<?php
namespace App\App\Http\Controllers;

use App\App\models\Users;
use App\config\App;
use App\config\Controller;
class UserController extends Controller
{
    public function UserController()
    {
       $title = "UserController";
       return $this->render("UserController"); 
      
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
    public  function serch_item()
    {
        if (App::$app->request->is_post()) {
            $DATA = App::$app->request->reqData();
            $USER = new Users();
            $DATA['username'] = $DATA['search'];
            unset ($DATA['search']);
           $serach_result= $USER->search($DATA);
       return $this->render('pages/users/search','ser',['search'=>$serach_result
    ]); 
                return false ;
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

