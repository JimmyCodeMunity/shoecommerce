<?php
@include('navbar.php');
?>

<section class="w-full h-screen">
    <div class="flex sm:px-16 px-6 sm:py-16 py-6 flex-row w-full justify-between items-center space-x-5">
        <div class="w-[70%] bg-white h-screen"></div>
        <div class="w-[30%] h-screen">
            <div class="w-full space-y-3 shadow shadow-lg border border-slate-300 border-1">
                <div class="bg-slate-200 w-full px-4 py-2">
                <h2 class="text-xl font-semibold tracking-wide">Order Summary</h2>
                </div>

                <div class="w-full bg-white px-4 py-2 space-y-3">
                    <div class="flex flex-row justify-between items-center">
                        <p class="font-semibold">Sub Total</p>
                        <p class="text-slate-600">$45</p>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="font-semibold">Shipping</p>
                        <p class="text-slate-600">Free</p>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="font-semibold">Tax</p>
                        <p class="text-slate-600">6%</p>
                    </div>
                </div>

                <div class="w-full bg-slate-200">
                <div class="w-full px-4 py-2 bg-slate-200 flex flex-row items-center justify-between">
                    <p class="font-semibold">Total</p>
                    <p class="font-bold">$567</p>
                </div>
                <div>
                <button class="w-full bg-green-500 rounded-md h-12">
                    <a href="" class="text-white">Checkout</a>
                </button>
                </div>
                </div>


            </div>
        </div>
    </div>
</section>