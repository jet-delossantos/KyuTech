<!-- HEADER FILE ATTACHMENT -->
<?php
    include_once 'header.php';
?>

<!-- MAIN INDEX PAGE -->

<body>
    <div class="hero">
        <form class="box" action="includes/login.inc.php" method = "post">
            <h1>LOGIN</h1>
            <h6> Please enter your username and password. </h6>
            <input type="text" name = "username" placeholder="Username">
            <input type="password" name = "pwd" placeholder="Password">
            <p href="" id="forgot">Forgot Password?</p>
            <button type="submit" name = "login-submit" value="Login">Login</button>
            <button type="register" value="Sign Up"><a class= 'mt-0 text-dark' href="register.php">Sign Up</button>
            <!-- <button type="submit"  name ="login-submit">Log In</button>
            <button type="button" ><a class= 'text-light' href="register.php">Register</a></button> -->
        </form>
    </div>

</body>

</html>