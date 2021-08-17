<?php
    include_once 'header.php';
?>

<body>

    <div class="container mw-50">
      <h2 class="my-3 ">LOGIN</h2>
        <form class="my-5 mw-50" action="includes/login.inc.php" method = "post">
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name = "username">
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name = "pwd">
            </div>
        <button type="submit" class="btn btn-primary" name ="login-submit">Log In</button>
        </form>
        <button type="button" class="p-50 btn btn-primary"><a class= 'text-light' href="register.php">Register</a></button>
    </div>
</body>
</html>