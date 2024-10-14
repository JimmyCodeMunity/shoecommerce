<?php
@include('../includes/connection.php');
session_start();

// if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
//   echo "User logged in",$_SESSION['username'];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NollyBee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <style>
    * {
      font-family: "Poppins", sans-serif;
    }
  </style>
  <!-- Navbar-->
  <nav class="bg-black w-full md:px-16 px-6 md:py-3 py-2">
    <div class="flex flex-row justify-between items-center">
      <div class="flex flex-row items-center space-x-5 items-center">
        <div>
          <h3 class="text-white text-2xl font-effect-glow">NollyBee</h3>
        </div>
        <div class="hidden md:block">
          <ul class="flex flex-row space-x-4">
            <li><a href="index.php" class="text-white text-sm">Home</a></li>
            <li><a href="" class="text-white text-sm">About</a></li>
            <li><a href="" class="text-white text-sm">Contact</a></li>
            <li><a href="" class="text-white text-sm">Shop</a></li>
            <li><a href="" class="text-white text-sm">Blog</a></li>
          </ul>
        </div>
      </div>
      <div class="hidden md:flex flex-row items-center">
        <ul class="flex flex-row items-center space-x-4">
          <li><a href="" class="text-white text-sm"><i class="fa fa-envelope"></i> shoppo@gmail.com</a></li>
          <li><a href="" class="text-white text-sm"><i class="fa fa-phone"></i> +254112123423</a></li>
        </ul>
      </div>
    </div>


    <!-- search -->

  </nav>
  <div class="w-full px-6 md:px-16 md:py-5 py-2 bg-gray-800 justify-between items-center flex flex-row">
    <div class="md:block hidden">
      <p class="text-white text-sm">Shop by category</p>
    </div>
    <div class="bg-slate-600 h-8 rounded-lg px- flex relative md:w-[400px]">
      <input type="text" class="bg-slate-600 text-white h-8 w-full focus:border-0 px-4 rounded-lg"
        placeholder="Search....">
      <button class="bg-green-400 md:block hidden text-white h-8 rounded-lg md:px-4 px-2 absolute right-0">Search</button>
      <button class="bg-green-400 md:hidden block text-white h-8 rounded-lg md:px-4 px-2 absolute right-0"><i class="fa fa-search"></i></button>
    </div>

    <div class="flex-row items-center space-x-5 hidden md:flex">

      <?php
      if ($_SESSION['logged_in'] == false) { ?>
        <div>
          <a href="./login.php" class="text-white nav-link"><i class="fa fa-user"></i> Login / Signup</a>
        </div>
      <?php } else { ?>
        <div>
          <a href="./profile.php" class="text-white nav-link"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?></a>
        </div>
      <?php } ?>
      ?>

      <div>
        <a href="pages/cart.php" class="text-white nav-link"><i class="fa fa-shopping-basket"></i></a>
      </div>
      <div>
        <?php if($_SESSION['logged_in'] == true) {?>
        <a href="./logout.php" class="text-white nav-link"><i class="fa fa-power-off"></i></a>
        <?php }?>
      </div>
    </div>
  </div>
  <!-- Navbar -->

</body>

</html>