<?php
  include "header.php";
  if (!isset($_SESSION['userId'])){
    header('Location:index.php');
  }
?>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
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
          <li class="">
            <a href="./account.php">
              <i class="nc-icon nc-circl-10"></i>
              <p>Account</p>
            </a>
          </li>
          <li class="active ">
            <a href="./about.php">
              <i class="nc-icon nc-email-85"></i>
              <p>Account</p>
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick=statusToastIdentify()>Top Left</button>
                        </div>
              <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
              <div class="bootstrap-iso">
              <div class="container-fluid">
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group ">
                    <label class="control-label " for="date">
                    Date
                    </label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
                  </div>
                </div>
                </div>
              </div>
              </div>

              <script>
                  $(document).ready(function(){
                      var date_input=$('input[name="date"]'); //our date input has the name "date"
                      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                      date_input.datepicker({
                          format: 'mm/dd/yyyy',
                          container: container,
                          todayHighlight: true,
                          autoclose: true,
                      })
                  })
              </script>
          </div>
        </div>
      </div>
<?php

include "footer.php";
