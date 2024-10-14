<?php
ob_start();
@include('layouts/navbar.php');
@include('includes/connection.php');
session_start();

if (isset($_POST['user_login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $selection = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $selection);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['verified'] == 1) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['logged_in'] = true;
            header('Location: index.php');
            exit();
        } else {
            header('location: verify.php');
            exit();
        }
    } else {
        $error[] = "Invalid email or password.";
    }
}
?>
<div class="w-full justify-center items-center h-screen">

    <div class="w-full h-full flex flex-row justify-evenly items-center sm:px-16 px-6">
        <div class="w-[50%]">
            <img src="assets/auth.png" alt="">
        </div>
        <div class="w-[50%]">
            <form action="" method="post">
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

                                <p class="text-green-400"><?php echo $success ?></p>
                        <?php
                            };
                        };
                        ?>
                    </div>
                </div>
                <h1 class="text-3xl font-semibold tracking-wide">Welcome to NollyBee</h1>
                <p class="text-slate-400">Sign into your account!</p>
                <div class="py-4 space-y-3">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Email</label>
                        <input name="email" type="email" placeholder="enter email" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="text-slate-600">Password</label>
                        <input name="password" type="password" placeholder="enter password" class="px-4 py-2 rounded-lg border border-slate-300 border-1">
                    </div>
                    <div>
                        <button type="submit" name="user_login" class="bg-green-400 h-10 w-40 rounded-lg text-white mt-3">Login</button>
                    </div>

                </div>
                <div>
                    <a href="register.php" class="text-slate-500">
                        Dont have an account?
                        <span class="text-green-400">Create Account</span>
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>