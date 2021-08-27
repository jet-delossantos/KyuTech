<?php
    include_once 'header.php';
?>


<body>
    <div class="hero">
      <form class="box" action = "includes/register.inc.php" method ="post">
        <h1>User Registration</h1>
        <h6> Create an Account. </h6>
        <div>

          <input type="text" placeholder="Username" required  name="username">

          <input type="text" placeholder="Email Address" required name="email">

          <input type="text" name="country" list="countryname" placeholder="Country of Origin" required>
            <datalist id="countryname">
              <option value="Argentina">
              <option value="Bangladesh">
              <option value="Bhutan">
              <option value="Costa Rica">
              <option value="Ghana">
              <option value="Japan">
              <option value="KyuTech">
              <option value="Malaysia">
              <option value="Mongolia">
              <option value="Nepal">
              <option value="Nigeria">
              <option value="Paraguay">
              <option value="Philippines">
              <option value="Sri Lanka">
              <option value="Sudan">
              <option value="Taiwan">
              <option value="Thailand">
              <option value="Uganda">
              <option value="Zimbabwe">     
            </datalist>

          <input type="text" placeholder="Contact" required name="contact">

          <input type="password" placeholder="Password" required name="pwd">

          <input type="password" placeholder="Re-type Password" required name="re-pwd">
        </div>
        <button type="submit" name='register-submit'>Register</button>  
        <button type="register" onclick="history.go(-1)">Back</button>  
      </form>     
    </div>
  </body>
</html>