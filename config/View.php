<?php

namespace App\config;

use App\App\Exceptions\fileNotFoundException;
use App\App\Exceptions\notFoundException;

class View
{
    public string $layout = 'main';
    public string $title = 'index';
    public function import_template($file_template,$keys)
    {
// ob_start();
// // include_once dirname(__DIR__)."//../tl/forms.html";

// include_once dirname(__DIR__) . '/resources/views/tl/' . $file_template . '.html';
// echo ob_get_clean();
foreach ($keys as $key => $value) {
    $$key = $value;
}
include_once dirname(__DIR__) . '/resources/views/tl/' . $file_template ;

        
    }
public function item($value,$name='text',$type='text',$pl= 'text') {
    $pl = $pl ? $name:$pl  ;
    switch ($value) {
        case 'button':
            echo '<div class="mb-6">   
  
   <input name="file" type="file" placeholder="image" class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
</div>';
            break;
        case 'box':
            echo '
   <input name="'.$name.'" type="'.$type.'" placeholder="'.$pl.'" class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
';
            break;
        
        default:
            # code...
            break;
    }
 
}    
    /**
     * render
     *
     * @param mixed page
     * @param mixed title
     * @param mixed params
     * @param mixed layout
     *
     * @return void
     */
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
        try {
            if (file_exists(dirname(__DIR__) . '/resources/views/' . $page . '.php')) {
                foreach ($params as $key => $value) {
                    $$key = $value;
                }
                ob_start();
                include_once dirname(__DIR__) . '/resources/views/' . $page . '.php';
                return ob_get_clean();
            } else {
                echo "page nto found";
            }
        } catch (\App\App\Exceptions\fileNotFoundException $th) {
            throw $th;
        }
        // if (file_exists(dirname(__DIR__) . '/resources/views/' . $page . '.php')) {
        // } else {

        //     return throw new fileNotFoundException();
        // }
        // throw new notFoundException();

    }
    public function error($page, $params = [] ?? null)
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
      if ($imageName !== 'userimg') {
        $ii = dirname(__DIR__) . '/storage/files/image/' . $imageName;
        $imageData = base64_encode(file_get_contents($ii));

        // Format the ii SRC:  data:{mime};base64,{data};
        $src = 'data:' . mime_content_type($ii) . ';base64,' . '';



        $imageData;

        // // Echo out a sample image
        echo "data:image/gif;base64,$imageData";
      }else {
        echo '/assets/logo.jpg';
    }
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
