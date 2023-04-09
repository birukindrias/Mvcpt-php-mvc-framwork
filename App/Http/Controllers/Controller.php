<?php

namespace App\App\Http\Controllers;

use App\App\models\Users;
use App\config\App;
use App\config\Controller as ConfigController;

class Controller extends ConfigController
{

  public function index()
  {
    return $this->render('home', 'Home');
  }
  public function profile()
  {
    $users = new Users();

    if (App::$app->request->is_post()) {
      $id = App::$app->session->getItem('id');
      $data = App::$app->request->reqData();
      $imageName = App::$app->request->filePath('file', 'image');

      if ($imageName) {
        $data['image'] = $imageName;
      }
      $users->update(['id' => $id], $data);
      App::$app->response->redirect('/profile');
    }
    return $this->render('pages/users/profile', 'Profile', [
      'user' => App::$app->users
    ]);
  }
  public  function serch_item()
  {
      if (App::$app->request->is_post()) {
          $DATA = App::$app->request->reqData();
          $USER = new Users();
          // //($DATA);
          $DATA['username'] = $DATA['search'];
          unset ($DATA['search']);
          // $USER->loadData($DATA);
          // $USER->validate();
         $serach_result= $USER->search($DATA);
     return $this->render('pages/users/search','ser',['search'=>$serach_result
  ]); 
              return false ;
      }

    
  }
  public function dashboard()
  {
    return $this->render('pages/users/dashboard', 'Dashboard');
  }
}