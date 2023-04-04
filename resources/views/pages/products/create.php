<section class="bg-[#F4F7FF] py-20 lg:py-[120px]">
    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                <div class="relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-16 px-10 text-center sm:px-12 md:px-[60px]">
                    <div class="mb-4 text-center md:mb-11">
                        <a href="/" class="mx-auto inline-block max-w-[160px]">
                            <img src="/assets/logo.jpg" alt="logo" />
                            <!-- <h3> Login </h3> -->
                        </a>
                    </div>
                    <form action="/create" method="post" enctype="multipart/form-data">
                        <?php
                        $this->item('box_', 'ProductName');
                        $this->item('box_', 'ProductPrice');
                        $this->item('box_', 'ProductAmount', 'number');
                        $this->item('file');
                        $this->item('button_', 'Post');
                        $this->item('form');
