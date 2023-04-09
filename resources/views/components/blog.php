<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mvc | users</title>
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/tailwind.css" />
</head>

<body>
    <!-- ====== Blog Section Start -->
    <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
        <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">

          <?php
          if (is_string($search)) {
           echo '<div class="w-full px-4 md:w-1/2 lg:w-1/3 text-center">'.$search.'';
           return;
          }
            foreach ($search as $key => $value) { foreach ($value as $keyi => $values) { 
                echo str_contains($value['image'],'base');
            ?>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mx-auto mb-10 max-w-[370px]">
                        <div class="mb-8 overflow-hidden rounded">
                            <!-- <img src="assets/images/blogs/blog-01/image-01.jpg" alt="image" class="w-full" /> -->
            <img src=<?= $this->image($value['image'])?> class="w-full">

                        </div>
                        <div>
                            <span class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
                  Dec 22, 2023
                </span>
                            <h3>
                                <a href="javascript:void(0)" class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                <?= $value['username']?>                 </a>
                                                
                            </h3>                            
                        
                            <p class="text-base text-body-color">
<?= '@'.$value['username']?>                 </a>
<?= str_contains($value['image'],'base');
                ?>                 </a>
                            

                            </p>
                        </div>
                    </div>
                </div><?php } }
                ?>

      

                
        

            </div>
        </div>
    </section>
    <!-- ====== Blog Section End -->
</body>

</html>