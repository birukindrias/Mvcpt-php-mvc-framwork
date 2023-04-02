<?php

namespace App\App\Http\Controllers;

use App\App\models\Users;
use App\config\App;
use App\config\Controller;

class AuthController extends Controller
{

    public function index()
    {
        return $this->render('hosme', 'home');
    }
    public function register()
    {


        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            $users->loadData($data);
            if ($users->validate() && $users->save()) {
                $id =  $users->get(['email' => $data['email'], 'password' => $data['password']])[0]['id'];
                App::$app->session->setItem('id', $id);
                App::$app->session->setFlash('success', 'Thanks for registering');
                App::$app->response->redirect('/home');
                return 'Show success page';
            }
        }
        return  $this->render('pages/Auth/register', 'register');
    }
    public function login()
    {
        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            $id =  $users->get(['email' => $data['email'], 'password' => $data['password']])[0]['id'];
            if ($id) {
                App::$app->session->setItem('id', $id);
                $users->uploadFile();
                return App::$app->response->redirect('/home');
            } else {
                echo 'email or password is wrong!';
            }
        }
        return  $this->render('pages/Auth/login', 'mvc | Login');
    }
    public function logOut()
    {
        session_unset();
        return
            App::$app->response->redirect('/login');
    }
}
