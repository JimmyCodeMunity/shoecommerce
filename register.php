<?php
ob_start();
@include('layouts/navbar.php');
@include('includes/connection.php');
error_reporting(1);
//form handling
if (isset($_POST['create_account'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $cpassword = md5($_POST['cpassword']);
    $password = md5($_POST['password']);
    //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $otp = rand(1000, 9999); //generate random 5 number
    $uid = bin2hex(random_bytes(12));
    //set expiry for the otp
    date_default_timezone_set('Africa/Nairobi'); // Set your timezone

    // Calculate expiration time (2 minutes from now)
    $currentTimestamp = time(); // Current timestamp
    $expirationTimestamp = strtotime('+3 minutes', $currentTimestamp); // Add 2 minutes

    // Format for MySQL datetime column
    $formattedExpirationTime = date('Y-m-d H:i:s', $expirationTimestamp);

    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $select);


    //check for availability
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already existing!!';
    } else {
        if ($password !== $cpassword) {
            // echo "Passwords do not match";
            $error[] = 'Passwords do not match';
        } else {
            $insert = "INSERT INTO users(username,email,address,phone,password,otp,expirationtime)VALUES('$username','$email','$address','$phone','$password','$otp','$formattedExpirationTime')";
            $successin = mysqli_query($conn, $insert);
            // $success[] = 'Account created Successfully!';

            if ($successin) {
                header('location:login.php');
                require('mail/send.php');
                sendVerificationEmail($email, $otp, $username);
                exit();
            }
        }
    }
}
?>

<div class="w-full justify-center items-center h-screen">
    <div class="w-full justify-center items-center flex">
    <div class="w-60">
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

            <p class="text-green-400"><?php echo $success ?></p>
    <?php
        };
    };
    ?>
    </div>
    </div>
    <div class="w-full h-full flex flex-row justify-evenly items-center sm:px-16 px-6">
        <div class="w-[50%]">
            <img src="assets/reg.png" alt="">
        </div>
        <div class="w-[50%]">
            <form action="" method="post">
                <h1 class="text-3xl font-semibold tracking-wide">Welcome to NollyBee</h1>
                <p class="text-slate-400">Create your account!</p>
                <div class="py-4 space-y-3">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Username</label>
                        <input type="text" name="username" placeholder="enter username" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Phone</label>
                        <input type="number" name="phone" placeholder="enter phone" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Email</label>
                        <input type="email" name="email" placeholder="enter email" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Address</label>
                        <input type="text" name="address" placeholder="enter address" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Password</label>
                        <input type="password" name="password" placeholder="enter password" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="consfirm password" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div>
                        <button type="submit" name="create_account" class="bg-green-400 h-10 w-40 rounded-lg text-white mt-3">SignUp</button>
                    </div>

                </div>
                <div>
                    <a href="login.php" class="text-slate-500">
                        Alreadt have an account?
                        <span class="text-green-400">Sign In</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>