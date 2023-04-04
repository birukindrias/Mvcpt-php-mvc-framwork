<?php

namespace App\App\Http\Controllers\Products;

use App\App\models\Users;
use App\config\App;
use App\config\Controller;

class ProductsController extends Controller
{
    public function ProductsController()
    {
        $title = "create";
        return $this->render("pages/products/create");
    }

    public  function create()
    {
        return $this->render("pages/products/create");
    }
    public  function store()
    {

        if (App::$app->request->is_Post()) {
            // var_dump(App::$app->request->getBody());
            $DATA = App::$app->request->reqData();
            $USER = new Users();

            $USER->loadData($DATA);
            var_dump($USER);
            return;
            // var_dump($DATA);
            $USER->validate();
            $USER->save();
            return;
        }
    }
    public  function update()
    {
        return;
    }
    public  function edit()
    {
        return;
    }
    public  function delete()
    {
        return;
    }
}
