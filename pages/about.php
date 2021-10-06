<?php
  include "header.php";
  if (!isset($_SESSION['userId'])){
    header('Location:index.php');
  }
?>
<div class="sidebar-wrapper">
  <ul class="nav">
    <?php
            if (isset($_SESSION['userId']) && $_SESSION['userPermission'] != 'Regular User') {
              echo '<li>';
            } else {
              echo '<li class="hide">';
            }
          ?>
    <a href="./dashboard.php">
      <i class="nc-icon nc-bank"></i>
      <p>Dashboard</p>
    </a>
    </li>
    <li>
      <a href="./satdata.php?query=default">
        <i class="nc-icon nc-spaceship"></i>
        <p>Sat Data</p>
      </a>
    </li>
    <li>
      <a href="./account.php">
        <i class="nc-icon nc-circle-10"></i>
        <p>Account</p>
      </a>
    </li>
    <li class="active ">
      <a href="./about.php">
        <i class="nc-icon nc-email-85"></i>
        <p>About Us</p>
      </a>
    </li>
  </ul>
</div>
</div>

<div class="main-panel" style="height: 100vh;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="javascript:;">Account Profile</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <!-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form> -->
        <ul class="navbar-nav">
          <li class="nav-item btn-rotate dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>
                <span class="d-lg-none d-md-block">Some Actions</span>
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="../includes/logout.inc.php" class="nav-link btn-rotate">
              LOGOUT
              <!-- <i class="nc-icon nc-settings-gear-65"></i> -->
              <!-- <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p> -->
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> PAGE IS UNDER CONSTRUCTION</h4>
            <p class="card-category"> Thank you for your patience</p>
            <img src="../assets/img/Building 01.jpg" alt="under construction">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

include "footer.php";