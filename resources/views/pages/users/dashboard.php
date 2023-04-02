<div class="w-screen h-screen text-black ">
    <div class="m-8 p-5 text-xl">
        <?php

        use App\config\App;

        if (App::$app->isGuest()) {
            echo 'welcome to the small  php mvc framework www';
        } else {
            echo "Dashboard
";
        } ?>
    </div>
</div>
