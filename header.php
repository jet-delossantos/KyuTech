<?php
    session_start();
    include_once 'includes/classautoloader.inc.php';
    include 'includes/functions.inc.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KyuTech Sat Data</title>
    <link rel="stylesheet" href="resources/stylesheet.css">
      <!--Font awesome and bootstrap links-->
    <script src="https://kit.fontawesome.com/fde27cd9e3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    
    
    <link rel="stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  </head>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><i class="fas fa-satellite-dish"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <!-- DEPENDE KUNG SINO NAKA LOGIN ANG USABILITY NG NAVBAR BUTTOONS -->
          <?php
            if (isset($_SESSION['userUsername']) && $_SESSION['userPermission'] != 'Regular User' ) {
              echo '
              <li class="nav-item">
                <a class="nav-link enabled" href="dashboard.php" tabindex="-1" aria-disabled="false">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="satdata.php?query=default" tabindex="-1" aria-disabled="true">Sat Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="account.php" tabindex="-1" aria-disabled="false">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="includes/logout.inc.php" tabindex="-1" aria-disabled="false">Logout</a>
              </li>'  
              ;
            } else if (isset($_SESSION['userUsername'])) {
               echo '
              <li class="nav-item">
                <a class="nav-link disabled" href="dashboard.php" tabindex="-1" aria-disabled="false">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="satdata.php?query=default" tabindex="-1" aria-disabled="false">Sat Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="header.php" tabindex="-1" aria-disabled="false">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="includes/logout.inc.php" tabindex="-1" aria-disabled="false">Logout</a>
              </li>'
              ; 
            } 
            else {
              echo '
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="false">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Sat Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="false">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Logout</a>
              </li>
              ';
            }
          ?>
        </ul>
      </div>
        <?php
        if (isset($_SESSION['userId'])){
            echo 'Welcome, '.$_SESSION['userUsername'].'!';
        } 
        ?>
    </div>
  </nav>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>    -->