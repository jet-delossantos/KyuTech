<?php
    include_once 'header.php';
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
          <li>
            <a href="./account.php">
              <i class="nc-icon nc-pin-3"></i>
              <p>Account</p>
            </a>
          </li>
          <li class="active ">
            <a href="#">
              <i class="nc-icon nc-badge"></i>
              <p>Add New User</p>
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
                  <a class="dropdown-item" href="#">Account Settings</a>
                  <a class="dropdown-item" href="#">Privacy Settings</a>
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
          <div class="col-md-9">
          <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add New User</h5>
              </div>
              <div class="card-body">
                <form action = "../includes/adduser.inc.php" method ="post">
                  <div class="row">
                    <!-- <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                      </div>
                    </div> -->
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder = "Username" required  name="username">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email" required name="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Access Level</label>
                        <select class="form-control"  name="permission">
                              <option value="Admin">Full Access Admin</option>
                              <option value="Uploader Admin">Uploader Admin</option>
                              <option value selected="Regular User">Regular User</option>
                      </select> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Country of Origin</label>
                        <select class="form-control" name="country" placeholder="Country of Origin" required>
                          <option value="Argentina">Argentina</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Bhutan">Bhutan</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Japan">Japan</option>
                          <option selected value="KyuTech">KyuTech</option>
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
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Contact Number" placeholder="Contact" required name="contact">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name='register-submit' class="btn btn-primary btn-round">Add New User</button>
                    </div>
                  </div>
                  <div class="row" style= "display: none;">
                    <input  type="password" placeholder="Password"  name="pwd" value = 'password'>
                    <input type="password" placeholder="Re-type Password" name="re-pwd" value = 'password'>
                  </div>
              </form>
              </div>
            </div>
 
          </div>
        </div>
      </div>




<?php
    include_once 'footer.php';