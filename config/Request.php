<?php

namespace App\config;

class Request
{
    public function urlPath()
    {
        $uri_REQ = $_SERVER['REQUEST_URI'];
        return strpos($uri_REQ, '?') ? substr($uri_REQ, 0, strpos($uri_REQ, '?')) : $uri_REQ;
    }
    public function urlMethod()
    {
        $METHOD_REQ = $_SERVER['REQUEST_METHOD'];
        return strtolower($METHOD_REQ);
    }
    public function is_post()
    {
        if ($this->urlMethod() == 'post') {
            return true;
        }
    }
    public function is_get()
    {
        if ($this->urlMethod() == 'get') {
            return true;
        }
    }
    public function reqData()
    {
        $body = [];
        if ($this->is_get()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            };
        } elseif ($this->is_post()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            };
        }
        return $body;
    }
    public function filePath($name, $path, $types = [] ?? '', $size = '' ?? null)
    {
        if (isset($_FILES[$name])) {
            $errors = array();
            $file_name = $_FILES[$name]['name'];
            $file_size = $_FILES[$name]['size'];
            $file_tmp = $_FILES[$name]['tmp_name'];
            $file_type = $_FILES[$name]['type'];
            $file_ext = strtolower(end(explode('.', $_FILES[$name]['name'])));

            $extensions = $types;
            if ($types != []) {

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }
            }

            if ($size != '') {
                if ($file_size > $size) {
                    $errors[] = "File size must be excately $$size MB";
                }
            }
            $rand = rand(0, 30000);;
            if ($file_size > 10) {
                if (empty($errors) == true) {
                    $randNme = rand(0, 30000) . $file_name;
                    move_uploaded_file($file_tmp, dirname(__DIR__) . '/storage/files/' . $path . '/' . $randNme);

                    return $randNme;
                } else {
                    return $errors;
                }
            } else {
                return App::$app->users->image  ;
            }
        }

        return false;
    }
}