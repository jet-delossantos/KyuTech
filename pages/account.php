<?php
  include "header.php";
  if (!isset($_SESSION['userId'])){
    header('Location:index.php');
  }


      $id = $_SESSION['userId'];
      $showUsersObj = new UsersView();
      $results = $showUsersObj-> showOneUser($id);
      $email = $results[0]['emailUsers'];
      $access = $results[0]['permissionsUsers'];
      $country = $results[0]['countryUsers'];
      $contact = $results[0]['contactUsers'];

?>
<div class="sidebar-wrapper">
  <ul class="nav">
    <?php
            if (isset($_SESSION['userId']) && $_SESSION['userPermission'] != '2') {
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
    <li class="active">
      <a href="./account.php">
        <i class="nc-icon nc-circle-10"></i>
        <p>Account</p>
      </a>
    </li>
    <li>
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
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">User logged in: <b><?php echo $_SESSION['userUsername']; ?></b></h5>
              </div>
              <div class="card-body">
              </div>
              <div class="card-footer ">
                <hr />
                <div class="stats">
                  <i class="nc-icon nc-share-66"></i> Number of file uploads: <b>0</b>
                </div>
                <br />
                <div class="stats">
                  <i class="nc-icon nc-cart-simple"></i> Number of file downloads: <b>0</b>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header ">
                <h5 class="card-title">Change Password</h5>
                <p class="card-category">Request for a password reset</p>
              </div>
              <div class="card-body">
                <form class="" action="" method="post">
                  <div class="col-md-10 pl-1">
                    <div class="form-group">
                      <label>Old Password</label>
                      <input type="password" class="form-control" placeholder="Email" required name="upemail"
                        value="<?php echo $email ?> ">
                      <label>New Password</label>
                      <input type="password" class="form-control" placeholder="Email" required name="upemail"
                        value="<?php echo $email ?> ">
                      <label>Repeat Password</label>
                      <input type="password" class="form-control" placeholder="Email" required name="upemail"
                        value="<?php echo $email ?> ">
                    </div>
                  </div>
                  <button type="submit" name="updateuser-button" class="btn btn-primary btn-round">Change My Password</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Your Account Info</h5>
                <p class="card-category">you can update your account information here</p>
              </div>
              <div class="card-body">
                <form class="" action="" method="post">
                  <div class="col-md-8 pl-1">
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control" placeholder="Email" required name="upemail"
                        value="<?php echo $email ?> ">
                    </div>
                  </div>
                  <div class="col-md-8 pl-1">
                    <div class="form-group">
                      <label>Country of Origin</label>
                      <select class="form-control" name="upcountry" required>
                        <option selected value="<?php echo $country ?> "><?php echo $country ?> </option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Japan">Japan</option>
                        <option value="KyuTech">KyuTech</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8 pl-1">
                    <div class="form-group">
                      <label>Contact Number</label>
                      <input type="text" class="form-control" placeholder="Contact Number" required name="upcontact"
                        value=<?php echo $contact ?>>
                    </div>
                  </div>
                  <div class="update ml-auto mr-auto center">
                    <button type="submit" name="updateuser-button" class="btn btn-primary btn-round">Edit User
                      Info</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php

include "footer.php";