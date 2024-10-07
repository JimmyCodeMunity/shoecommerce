<?php
@include('includes/connection.php');

$select = "SELECT * FROM products WHERE availability = 1";
$result = mysqli_query($conn, $select);
?>
<section class="w-full py-8 sm:px-16 px-6">
    <div class="w-full flex flex-row justify-between items-center">
        <h1 class="text-2xl font-semibold">Most Popular</h1>
        <a href="" class="text-green-500 text-lg">View All</a>
    </div>

    <div class="w-full flex flex-row justify-start">
        <?php
        if (mysqli_num_rows(($result)) < 0) {
        ?>
            <p class="text-center text-gray-500">No products found</p>
        <?php } else { ?>
            <?php while ($row = mysqli_fetch_array($result)) { ?>

                <div class="grid gap-4 grid-col-4 p-4">
                    <a href="pages/viewproduct.php?id=<?php echo $row['id']?>" class="w-full">
                        <img src="admin/images/<?php echo $row['image'] ?>" class="w-60 h-60" alt="productimage">
                        <div>
                            <h2><?php echo $row['name'] ?></h2>
                            <p class="text-slate-500"><?php echo $row['description'] ?></p>
                            <div class="flex-row items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="flex-row items-center w-full flex justify-between">
                                <div class="flex flex-row justify-between items-center w-full">
                                    <p class="text-green-500 font-normal">Add to cart</p>
                                </div>
                                <div class="rounded-full h-10 w-10 flex justify-center items-center bg-green-400">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <h3 class="text-green-500 text-xl font-semibold tracking-wider">Kshs.<?php echo $row['price'] ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>


        <?php } ?>



    </div>
</section>