<?php
    include '../includes/functions.inc.php';
    $status = "Hello";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KyuTech Sat Data</title>  
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <!--Font awesome and bootstrap links-->
    <script src="https://kit.fontawesome.com/fde27cd9e3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
</head>

    <?php
        identifyToastStatus($status);
    ?>
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

<?php
    include "footer.php";
?>
