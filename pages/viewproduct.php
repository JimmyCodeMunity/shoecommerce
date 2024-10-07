<?php
@include("navbar.php");
@include("../includes/connection.php");
session_start();

$id = $_GET['id'];
$select = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_array($result);
?>


<section class="w-full h-screen flex-row flex justify-between items-center sm:px-16 px-6 sm:my-16 py-6">
    <div class="w-[50%]">
        <img src="../admin/images/<?php echo $row['image'] ?>" class="object-fit w-[400px] h-[400px] rounded-md" alt="">
    </div>
    <div class="w-[50%] space-y-5 px-4">
        <h1 class="font-bold text-4xl"><?php echo $row['name'] ?></h1>
        <h2 class="font-bold text-green-500">Ksh.<?php echo $row['price'] ?></h2>
        <p>Size: <?php echo $row['size'] ?></p>
        <p>Color: <?php echo $row['color'] ?></p>
        <p><?php echo $row['description'] ?></p>
        <div class="flex flex-row items-center">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>

        <?php if ($_SESSION['logged_in'] == true) { ?>
            <button class="h-12 w-60 text-white bg-green-500 rounded-xl" type="button">
                Buy Now
            </button>
        <?php } else { ?>
            <button class="text-white h-12 w-60 bg-green-500 rounded-xl" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
                Buy Now
            </button>
        <?php } ?>

    </div>






    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">You are not logged In.Please do so to continue.</h3>
                    <button data-modal-hide="popup-modal" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Login
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-300 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

</section>