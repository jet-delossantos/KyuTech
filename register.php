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

          <!-- <select class="form-select" name= "country" value ="">
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
          </select> -->

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