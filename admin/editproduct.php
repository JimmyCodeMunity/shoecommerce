<?php
@include('includes/connection.php');
$id = $_GET['id'];
$select = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $select);

$row = mysqli_fetch_array($result);

if (isset($_POST['edit_product'])) {
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    

    $insertion = "UPDATE products SET name = '$productname', price = '$price',size = '$size',color = '$color',description = '$description' WHERE id = '$id'";
    $result = mysqli_query($conn, $insertion);

    if ($result) {
        // echo "Product added successfully";
        $success[] = "Product updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
        $error[] = 'Error occurred while updating product';
    }
}
?>
<div class="w-full flex-row flex items-start justify-between bg-purple-100">
    <div class="w-[20%]">
        <?php
        @include('sidebar.php')
        ?>
    </div>
    <div class="w-[80%]">
        <?php
        @include('navbar.php');
        ?>

        <div class="w-full sm:px-16 px-6">


            <div class="w-full flex flex-col">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="w-full justify-center items-center flex">
                        <div class="w-full">
                            <?php
                            if (isset($error)) {
                                foreach ($error as $error) { ?>

                                    <p class="text-red-400"><?php echo $error ?></p>
                            <?php
                                };
                            };
                            ?>
                            <?php
                            if (isset($success)) {
                                foreach ($success as $success) { ?>

                                    <p class="text-red-400"><?php echo $success ?></p>
                            <?php
                                };
                            };
                            ?>

                        </div>
                    </div>
                    <div class="w-full space-y-4">
                        <a href="products.php" class="bg-purple-400 justify-center items-center flex rounded-full h-10 w-10">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <h1 class="font-semibold text-xl">Edit Product</h1>
                        <div class="w-full flex flex-col justify-between items-center space-x-3">
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Productname</label>
                                <input name="productname" value="<?php echo $row['name'] ?>" placeholder="enter productname" type="text" class="h-10 w-full border border-[0.2px] border-slate-100 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Price</label>
                                <input name="price" value="<?php echo $row['price'] ?>" placeholder="enter price" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">color</label>
                                <input name="color" value="<?php echo $row['color'] ?>" placeholder="enter color" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Size</label>
                                <input name="size" value="<?php echo $row['size'] ?>" placeholder="enter size" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Description</label>
                                <!-- textarea-->
                                <textarea value="<?php echo $row['description'] ?>" name="description" placeholder="enter description" class="h-32 w-full border border-1 border-slate-300 rounded-lg px-4" rows="4">
                                <?php echo $row['description'] ?>
                                </textarea>
                            </div>
                            <div class="w-full space-y-2 mt-3">
                                <img src="images/<?php echo $row['image'] ?>" class="h-32 w-32" alt="">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Image</label>
                                <!-- textarea-->
                                <input name="productimage" value="<?php echo $row['image'] ?>" type="file" class="bg-slate-200 rounded-md py-2 h-12 w-full">
                            </div>

                        </div>

                        <button name="edit_product" class="w-60 h-12 rounded-lg bg-purple-400 text-white">Add product</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>