
<body class="bg-blue-100 antialiased " style="background-image: url(<?=$this->image($user->image);?> );">
    <div class="container mx-auto my-32">
        <div>

            <div class="bg-white relative shadow rounded-lg  w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto py-8">
                <div class="flex justify-center">
                    <img src=<?=$this->image($user->image);?>  alt="" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
                </div>

                <div class="mt-16">
                    <h1 class="font-bold text-center text-3xl text-gray-900"><?= '@'.$user->username ?></h1>
                    <p class="text-center text-sm text-gray-400 font-medium">-- +++ --</p>
                    <p>
                        <span>
                            
                        </span>
                    </p>
                    <div class="my-5 px-6">
                        <form action="/profile" method="post" enctype="multipart/form-data">

<!-- 
                        <div class="mb-6">
                            <input name="file" value=<?= $user->image ?> type="file" placeholder="image" class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                        </div> -->
                        <?php
    // use App\config\App;
$this->item('button');
// include_once dirname(__DIR__)."/../tl/profile.html";?>
                        <div class="mb-6">
                            <input name="username" value=<?= $user->username ?> type="text" placeholder="username" class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                        </div>
                            <div class="mb-6">
                                <input name="email" value=<?= $user->email ?> type="email" placeholder="Email" class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-6">
                                <input name="password" value=<?= $user->password ?> type="password" placeholder="Password" class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-10">                                
                               
                                <button type="submit"
                                class="bordder-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white bg-blue-500 transition hover:bg-opacity-90  duration-200 transform hover:scale-110">Update
        </button>                            
                           
                            </div>
                            </form>
                            <!-- <a href="#" class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white">Connect with <span class="font-bold">@pantazisoft</span></a> -->
                    </div>

                  
                </div>
            </div>

        </div>
    </div>
