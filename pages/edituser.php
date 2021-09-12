<?php
    include_once 'header.php';
    if (!isset($_SESSION['userId'])){
      header('Location:index.php');
    }


    if (isset($_GET['updatebutton'])) {
      $id = $_GET['updatebutton'];
      $showUsersObj = new UsersView();
      $results = $showUsersObj-> showOneUser($id);
      $username = $results[0]['usernameUsers'];
      $email = $results[0]['emailUsers'];
      $access = $results[0]['permissionsUsers'];
      $country = $results[0]['countryUsers'];
      $contact = $results[0]['contactUsers'];
  }
     if (isset($_POST['updateuser-button'])) {
  
       $usernameUpdate = $_POST['upusername'];
       $emailUpdate = $_POST['upemail'];
       $countryUpdate = $_POST['upcountry'];
       $contactUpdate = $_POST['upcontact'];
       $accessUpdate = $_POST['upaccess'];
       $updateUsersObj = new UsersController();
       $updateUsersObj-> editUser($id,$usernameUpdate ,$emailUpdate, $countryUpdate, $contactUpdate, $accessUpdate);
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
              <p>Edit User Info</p>
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
          <div class="col-md-9">
          <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Update User Info</h5>
              </div>
              <div class="card-body">
                <form method ="post">
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
                        <input type="text" class="form-control" placeholder="Username" required  name= "upusername" value = <?php echo $username ?>>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email" required name= "upemail" value = <?php echo $email ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Access Level</label>
                        <input type="text" class="form-control" placeholder = "<?php echo $access ?>" name="upaccess" list="permissions">
                          <datalist id="permissions">
                              <option selected><?php echo $access?></option>
                              <option value="Admin">
                              <option value="Uploader Admin">
                              <option value="Regular User">
                          </datalist>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Country of Origin</label>
                        <input type="text" class="form-control" name= "upcountry" placeholder = "<?php echo $country ?>" list="countryname" required>
                        <datalist id="countryname">
                          <option selected><?php echo $country?></option>
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
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Contact Number" required  name= "upcontact" value = <?php echo $contact ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="updateuser-button" class="btn btn-primary btn-round">Edit User Info</button>
                    </div>
                  </div>
              </form>
              </div>
            </div>
 
          </div>
        </div>
      </div>




<?php
    include_once 'footer.php';