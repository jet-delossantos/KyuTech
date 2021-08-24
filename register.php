<?php
    include_once 'header.php';
?>


<body>
    <div class="container">
      <h2 class="my-5 text-center">User Registration</h2>
      <form action = "includes/register.inc.php" method ="post">
        <div class="mb-3 my-4">
          <label class="mt-2 form-label"><strong>Username</strong></label>
          <input type="text" class="form-control" name="username">

          <label class="mt-4 form-label"><strong>Email</strong></label>
          <input type="text" class="form-control" name="email">

          <label class="mt-4 form-label"><strong>Cousntry of Origin</strong></label>
          <select class="form-select" name= "country" value ="">
            <option selected>Select Country</option>
            <option value="KyuTech"><i class="fas fa-satellite-dish"></i> KyuTech</option>
            <option value="Ghana"><i class="fas fa-flag"></i> Ghana</option>
            <option value="Nigeria"><i class="fas fa-flag"></i> Nigeria</option>
            <option value="Mongolia"><i class="fas fa-flag"></i> Mongolia</option>
            <option value="Bangladesh"><i class="fas fa-flag"></i> Bangladesh</option>
            <option value="Thailand"><i class="fas fa-flag"></i> Thailand</option>
            <option value="Taiwan"><i class="fas fa-flag"></i> Taiwan</option>
            <option value="Bhutan"><i class="fas fa-flag"></i> Bhutan</option>
            <option value="Malaysia"><i class="fas fa-flag"></i> Malaysia</option>
            <option value="Philippines"><i class="fas fa-flag"></i> Philippines</option>
            <option value="Sri Lanka"><i class="fas fa-flag"></i> Sri Lanka</option>
            <option value="Nepal"><i class="fas fa-flag"></i> Nepal</option>
            <option value="Costa Rica"><i class="fas fa-flag"></i> Costa Rica</option>
            <option value="Paraguay"><i class="fas fa-flag"></i> Paraguay</option>
            <option value="Argentina"><i class="fas fa-flag"></i> Argentina</option>
            <option value="Sudan"><i class="fas fa-flag"></i> Sudan</option>
            <option value="Zimbabwe"><i class="fas fa-flag"></i> Zimbabwe</option>
            <option value="Uganda"><i class="fas fa-flag"></i> Uganda</option>
          </select>


          <label class=" mt-4 form-label"><strong>Contact Number</strong></label>
          <input type="text" class="form-control" name="contact">

          <label class="mt-4 form-label"><strong>Password</strong></label>
          <input type="password" class="form-control" name="pwd">

          <label class="mt-4 form-label"><strong>Repeat Password</strong></label>
          <input type="password" class="form-control" name="re-pwd">
        </div>
        <button type="submit" class="btn btn-primary" name='register-submit'>Register</button>
      </form>
    </div>
  </body>
</html>v