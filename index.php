<?php
@include('layouts/navbar.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NollyBee</title>
</head>

<body>
    <div class="flex md:flex-row flex-col justify-between items-center w-full">
        <div class="w-full <?php echo 'hidden md:block' ?>">
            <?php @include('layouts/sidebar.php') ?>
        </div>
        
        <div class="w-full">
            <div class="w-full h-full justify-start md:py-5 py-2 items-start md:px-16 px-2">
                <div class="rounded-2xl overflow-hidden">
                    <img src="assets/banner.jpg" alt="" class="md:h-full h-32 rounded-2xl object-cover w-full">
                </div>
                <div class="md:flex hidden flex-row justify-between items-center w-full py-8">
                    <div class="flex flex-row items-center space-x-3">
                        <div>
                            <img src="./assets/delivery-bike.png" class="h-16 w-16" alt="">
                        </div>
                        <div>
                            <h5 class="text-sm">Free Shipping</h5>
                            <p class="text-sm text-slate-500">On all orders</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center space-x-3">
                        <div>
                            <img src="./assets/customer-service(1).png" class="h-16 w-16" alt="">
                        </div>
                        <div>
                            <h5 class="text-sm">Customer Support</h5>
                            <p class="text-sm text-slate-500">At all times</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center space-x-3">
                        <div>
                            <img src="./assets/coupons.png" class="h-16 w-16" alt="">
                        </div>
                        <div>
                            <h5 class="text-sm">Coupons</h5>
                            <p class="text-sm text-slate-500">On all products</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="w-full <?php echo 'block md:hidden' ?>">
            <?php @include('layouts/categorymenu.php') ?>
        </div>
        <div class="w-full <?php echo 'hidden md:block' ?>">
            <div class="w-full h-screen px-8 py-5">
                <div class="border border-green-500 w-80 h-[80%] rounded-xl relative">
                    <div class="justify-center items-center flex flex-col py-5 px-4">
                        <img src="./assets/airblue.jpg" class="object-cover" alt="">
                        <h2 class="text-xl font-bold text-center">Jordan 4 retro blue + free delivery</h2>
                        <h2 class="text-xl font-bold text-center text-green-500">Ksh.4500</h2>
                        <div class="flex flex-row w-full items-center text-center justify-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="absolute bottom-20 w-full justify-center flex items-center">
                            <div class="w-60 h-12 bg-green-400 rounded-full flex flex-row justify-center items-center rounded-2xl relative">
                                <a href="" class="text-white">Buy Now</a>
                                <div class="rounded-full h-12 w-12 absolute right-0 bg-white justify-center items-center flex">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- display -->
    <div class="w-full grid grid-cols-4 justify-center items-center gap-2 sm:px-16 px-6">
        <div class="w-full grid rounded-xl overflow-hidden relative md:h-[200px] min-h-[100px]">
            <img src="assets/jordanwhite.jpg" class="w-full h-full rounded-xl object-cover" alt="">
            <div class="absolute space-y-2 z-20 bg-black bg-opacity-50 flex flex-col inset w-full h-full justify-center items-center">
                <p class="text-white text-lg">New Orders</p>
                <p class="text-white text-2xl font-bold">Jordan 4's</p>
                <a href="" class="border text-white rounded-2xl px-4 border-white border-2">
                    Shop
                </a>
            </div>
        </div>
        <div class="w-full grid rounded-xl overflow-hidden relative md:h-[200px] min-h-[100px]">
            <img src="assets/airblack.jpg" class="md:w-full md:h-full h-16 w-16 rounded-xl object-cover" alt="">
            <div class="absolute space-y-2 z-20 bg-black bg-opacity-50 flex flex-col inset w-full h-full justify-center items-center">
                <p class="text-white md:text-lg text-normal">New orders</p>
                <p class="text-white md:text-2xl text-normal md:font-bold font-semibold">Airforce1 Black</p>
                <a href="" class="border text-white rounded-2xl px-4 border-white border-2">
                    Shop
                </a>
            </div>
        </div>
        <div class="w-full grid rounded-xl overflow-hidden relative md:h-[200px] min-h-[100px]">
            <img src="assets/airjblue.jpg" class="w-full h-full rounded-xl object-cover" alt="">
            <div class="absolute space-y-2 z-20 bg-black bg-opacity-50 flex flex-col inset w-full h-full justify-center items-center">
                <p class="text-white text-lg">New Orders</p>
                <p class="text-white text-2xl font-bold">Air Jordans</p>
                <a href="" class="border text-white rounded-2xl px-4 border-white border-2">
                    Shop
                </a>
            </div>
        </div>
        <div class="w-full grid rounded-xl overflow-hidden relative md:h-[200px] min-h-[100px]">
            <img src="assets/crocks.jpg" class="w-full h-full rounded-xl object-cover" alt="">
            <div class="absolute space-y-2 z-20 bg-black bg-opacity-50 flex flex-col inset w-full h-full justify-center items-center">
                <p class="text-white text-lg">New Orders</p>
                <p class="text-white text-2xl font-bold">Crocks</p>
                <a href="" class="border text-white rounded-2xl px-4 border-white border-2">
                    Shop
                </a>
            </div>
        </div>


    </div>



    <!-- products -->
    <div class="w-full">
        <?php @include('sections/products.php') ?>
    </div>
    <!-- footer section -->
    <div class="w-full">
        <?php @include('layouts/footer.php') ?>
    </div>

</body>

</html>