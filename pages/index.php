<?php
    include '../includes/functions.inc.php';
    
    if (isset($_GET['status'])){
        $status = $_GET['status'];
      } else {
        $status = "";
      }
?>
<!-- MAIN INDEX PAGE -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KyuTech Sat Data</title>  
        <link rel="stylesheet" href="../assets/css/stylesheet.css">
        <!--Font awesome and bootstrap links-->

         <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>

    <?php
        identifyToastStatus($status);
    ?>
        <div class="hero">
            <div class="box">
                <form action="../includes/login.inc.php" method="post">
                    <h1>LOGIN</h1>
                    <h6> Please enter your username and password. </h6>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <p href="" id="forgot">Forgot Password?</p>
                    <button type="submit" name="login-submit" value="Login">Login</button>
                </form>
                <button type="register" value="Sign Up" onclick="window.location.href='register.php'"><a class='mt-0 text-dark' href="register.php"><a class=text-light>Sign Up</a></button>
            </div>
        </div>

    <?php
        include "footer.php";
    ?>
