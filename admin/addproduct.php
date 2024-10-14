<?php
@include('includes/connection.php');

if (isset($_POST['create_product'])) {
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $path = "images/" . basename($image_name);

    $image_name = $_FILES["productimage"]["name"];

    $file_extension = pathinfo($_FILES["productimage"]["name"], PATHINFO_EXTENSION);

    $allowed_ext = array("png", "jpg");

    if (!in_array($file_extension, $allowed_ext)) {
        // header("Location:map.php");
        $error[] = 'error uploading image';
        // exit();
    }
    $profile_pic = rand() . $profile_pic . '.' . $file_extension;

    $profile_pic_tmp_name = $_FILES["productimage"]["tmp_name"];

    $target = $path . $profile_pic;

    move_uploaded_file($profile_pic_tmp_name, $target);

    $insertion = "INSERT INTO products (name, price,size,color,image,description,category) VALUES ('$productname', '$price','$size','$color','$profile_pic','$description','$category')";
    $result = mysqli_query($conn, $insertion);

    if ($result) {
        // echo "Product added successfully";
        $error[] = "Product added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
        $error[] = 'Error occurred while inserting product';
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
                <form action="" method="post" enctype ="multipart/form-data">
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
                        
                    </div>
                </div>
                    <div class="w-full space-y-4">
                        <h1 class="font-semibold text-xl">Add New Product</h1>
                        <div class="w-full flex flex-col justify-between items-center space-x-3">
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Productname</label>
                                <input name="productname" placeholder="enter productname" type="text" class="h-10 w-full border border-[0.2px] border-slate-100 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Price</label>
                                <input name="price" placeholder="enter price" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">color</label>
                                <input name="color" placeholder="enter color" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Size</label>
                                <input name="size" placeholder="enter size" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Category</label>
                                <input name="category" value="<?php echo $row['category'] ?>" placeholder="enter size" type="text" class="h-10 w-full border border-1 border-slate-300 rounded-lg px-4">
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Description</label>
                                <!-- textarea-->
                                <textarea name="description" placeholder="enter description" class="h-32 w-full border border-1 border-slate-300 rounded-lg px-4" rows="4"></textarea>
                            </div>
                            <div class="w-full space-y-2">
                                <label for="" class="text-slate-400">Image</label>
                                <!-- textarea-->
                                <input name="productimage" type="file" class="bg-slate-200 rounded-md py-2 h-12 w-full">
                            </div>

                        </div>

                        <button name="create_product" class="w-60 h-12 rounded-lg bg-purple-400 text-white">Add product</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>