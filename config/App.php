<?php

namespace App\config;

use App\App\models\Users;
use Throwable;

class App
{
    public Users $users;
    public Request $request;
    public Response $response;
    public Session $session;
    public Router $router;
    public Database $database;
    public View $view;
    public string $assetsStyleValue = '';
    public Controller $controller;
    public string $action;
    public static $app;
    public static $main_path;
    public function __construct($db_config)
    {
        self::$app = $this;
        self::$main_path = 'dirname(__DIR__)';
        $this->users = new Users();
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router();
        $this->database = new Database($db_config);
        $this->view = new View();
    }
    public function isGuest()
    {
        // echo "<pre>";
        // $id = $this->session->getItem('id') ?? '';
        if ($this->session->getItem('id') == '') {
            return true;
        } elseif ($id = $this->session->getItem('id')) {
            $user = $this->users->get(['id' => $id])[0];
            $loading = $this->users->loadData($user);
            return false;
        }
    }
    public function run()
    {
        try {
            echo  $this->router->resolve();
        } catch (\Exception $e) {
            $this->view->title = 'error';
            $this->response->setStatusCode($e->getCode());
            echo App::$app->view->render('pages/error/error', 'error', ['error' => $e]);
        }
    }
}