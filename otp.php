<?php
@include('layouts/navbar.php');
@include('includes/connection.php');

//$email = $_GET['email'];
date_default_timezone_set('Africa/Nairobi');
$uid = $_GET['uid'];
$selection = "SELECT * FROM users WHERE email = '$uid'";
$res = mysqli_query($conn, $selection);



$row = mysqli_fetch_array($res);
$expiry = $row['expirationtime'];
$email = $row['email'];
$username = $row['username'];


$currentTime = date('Y-m-d H:i:s');
$currentotp = $row['otp'];
// echo "otp", $currentotp;


if (isset($_POST['submit'])) {
    $enteredotp = $_POST['otp'];
    // echo "enteredotp", $enteredotp;

    $select = "SELECT * FROM users WHERE email = '$uid' && otp = '$enteredotp'";
    $result = mysqli_query($conn, $select);


    //check expiry

    if ($currentTime < $expiry) {
        if ($enteredotp != $currentotp) {
            // echo "Wrong OTP";
            $error[] = 'You have entered a wrong OTP Code';
        } else {
            // echo "Account created successfully";
            $verify = "UPDATE users SET verified = 1 WHERE email = '$uid'";
            $verified = mysqli_query($conn, $verify);
            if ($verified) {
                header("Location:login.php");
            } else {
                $error[] = 'Failed to verify your account!';
            }
        }
    } else {
        // echo "OTP has already expired";
        $error[] = 'OTP entered has already expired';
    }
}


if (isset($_POST['resend'])) {
    $newotp = rand(1000, 9999);
    date_default_timezone_set('Africa/Nairobi'); // Set your timezone

    // Calculate expiration time (2 minutes from now)
    $currentTimestamp = time(); // Current timestamp
    $expirationTimestamp = strtotime('+3 minutes', $currentTimestamp); // Add 2 minutes

    // Format for MySQL datetime column
    $formattedExpirationTime = date('Y-m-d H:i:s', $expirationTimestamp);

    $select = "SELECT * FROM users WHERE email = '$uid'";
    $selected = mysqli_query($conn, $select);

    if ($selected) {
        $update = "UPDATE users SET otp = '$newotp',expirationtime='$formattedExpirationTime' WHERE email = '$uid'";
        $succupdate = mysqli_query($conn, $update);
        $updated = "SELECT * FROM users WHERE email = '$uid'";
        $selectedupdate = mysqli_query($conn, $updated);
        $rows = mysqli_fetch_array($selectedupdate);
        $otp = $rows['otp'];
        $success[] = 'New  OTP has been sent successfully!';

        if ($succupdate) {
            
            require('mail/send.php');
            echo "new otp sent successfully";
            $success[] = 'New  OTP has been sent successfully!';
            sendVerificationEmail($email, $otp, $username, $uid);
        }
    }
}
?>

<div class="w-full flex flex-col h-screen justify-center items-center">
    <div class="w-full justify-center items-center flex py-5">
        <div class="w-full text-center">
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
    <form action="" method="post">
        <div class="flex flex-col justify-center items-center space-y-4">
            <img src="assets/otp.png" alt="">

            <div class="flex flex-col space-y-2 justify-center items-center">
                <label for="" class="text-slate-600">Enter OTP</label>
                <input name="otp" type="number" placeholder="enter otp" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
            </div>
            <div>
                <button name="submit" type="submit" class="bg-green-400 h-10 w-40 rounded-lg text-white">Verify</button>
            </div>
            <div>
                <button name="resend" type="submit" class="bg-green-400 h-10 w-40 rounded-lg text-white">Resend</button>
            </div>
            <!-- <div>
                <a href="" class="text-green-400">resend OTP</a>
            </div> -->


        </div>
    </form>
</div>