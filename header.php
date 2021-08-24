<?php
    session_start();
    include_once 'includes/classautoloader.inc.php';
?>

<script>
function goBack() {
  window.history.back();
}
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!--Font awesome and bootstrap links-->
    <script src="https://kit.fontawesome.com/fde27cd9e3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><i class="fas fa-satellite-dish"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- DEPENDE KUNG SINO NAKA LOGIN ANG USABILITY NG NAVBAR BUTTOONS -->
          <?php
            if (isset($_SESSION['userUsername']) && $_SESSION['userUsername'] == 'admin') {
              echo '
              <li class="nav-item">
                <a class="nav-link disabled" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="dashboard.php" tabindex="-1" aria-disabled="false">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="satdata.php" tabindex="-1" aria-disabled="true">Sat Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="includes/logout.inc.php" tabindex="-1" aria-disabled="false">Logout</a>
              </li>'
              ;
            } else if (isset($_SESSION['userUsername'])) {
               echo '
              <li class="nav-item">
                <a class="nav-link disabled" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="dashboard.php" tabindex="-1" aria-disabled="false">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="satdata.php" tabindex="-1" aria-disabled="false">Sat Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link enabled" href="includes/logout.inc.php" tabindex="-1" aria-disabled="false">Logout</a>
              </li>'
              ; 
            } 
            else {
              echo '
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="false">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Sat Data</a>
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

 
 