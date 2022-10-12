<?php

namespace App\config;


class View
{
    public string $layout = 'main';
    public string $title = 'index';

    public function render($page, $title = '' ?? '', $params = [] ?? null, $layout = 'main')
    {
        $this->layout = $layout;
        $this->title = $title;
        $_layout = $this->getLayout();
        $_page = $this->view($page, $params);
        $wpage = str_replace('{content}', $_page, $_layout);
        $wstyles = str_replace('{style}', App::$app->assetsStyleValue, $wpage);

        return   $wstyles;
    }
    public function view($page, $params = [] ?? null)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once dirname(__DIR__) . '/resources/views/' . $page . '.php';
        return ob_get_clean();
    }

    public function image($imageName)
    {
        $ii = dirname(__DIR__) . '/storage/files/image/'.$imageName;
        $imageData = base64_encode(file_get_contents($ii));

        // Format the ii SRC:  data:{mime};base64,{data};
        $src = 'data:' . mime_content_type($ii) . ';base64,' .
            '';



        $imageData;

        // // Echo out a sample image
        echo "data:image/gif;base64,$imageData";
    }
    public function getLayout()
    {
        ob_start();
        include_once dirname(__DIR__) . '/resources/views/layout/' . $this->layout . '.php';
        return ob_get_clean();
    }
    public function asset($asset)
    {
        $assets = file_get_contents(dirname(__DIR__) . '/resources/assets/' . $asset);
        // echo $assets;
        if (str_contains($asset, 'css')) {
            return  App::$app->assetsStyleValue .= "<style>  $assets</style>";
        } elseif (str_contains($asset, 'js')) {
            return  App::$app->assetsStyleValue .= "<script>  $assets </script>";
        }
    }
}