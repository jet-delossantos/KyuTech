<?php
    include_once 'header.php';
?>


<body>
    <div class="container">
      <h2 class="my-5">User Data Register</h2>
      <form action = "includes/register.inc.php" method ="post">
        <div class="mb-3 my-4">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username">

          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email">

          <label class="form-label">Country of Origin</label>
          <input type="text" class="form-control" name="country">

          <label class="form-label">Contact Number</label>
          <input type="text" class="form-control" name="contact">

          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="pwd">

          <label class="form-label">Repeat Password</label>
          <input type="password" class="form-control" name="re-pwd">
        </div>
        <button type="submit" class="btn btn-primary" name='register-submit'>Register</button>
      </form>
    </div>
  </body>
</html>