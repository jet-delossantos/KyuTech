<?php
  include "header.php";

  if (!isset($_SESSION['userId'])){
    header('Location: index.php');
  }
?>
<div class="start">
<div class="sidebar-wrapper">
  <ul class="nav">
          <?php
            if (isset($_SESSION['userId']) && $_SESSION['userPermission'] != '2') {
              echo '<li class="active">';
            } else {
              echo '<li class="hide">';
            }
          ?>
      <a href="dashboard.php">
        <i class="nc-icon nc-bank"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li>
      <a href="satdata.php?query=default">
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
    <li>
      <a href="./about.php">
        <i class="nc-icon nc-email-85"></i>
        <p>About Us</p>
      </a>
    </li>
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
        <a class="navbar-brand" href="javascript:;">Dashboard</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item btn-rotate dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
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

        <!-- User List Table -->
        <div class="card" <?php 
             if (isset($_SESSION['userUsername']) && $_SESSION['userPermission'] != '0' ) {
              echo 'style="display: none;"';
             }
          ?>>
          <div class="card-header">
            <h4 class="card-title"> User List</h4>
          </div>
          <div class="card-body">
            <button type="submit" class="btn btn-primary" name="upload-button"><a class='text-light'
                href="adduser.php">Add New User</a></button>
            <div class="table-responsive scrollable">
              <table class="table">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Access</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                <tbody>
                  <?php
                      $showAllUsersObj = new UsersView();
                      $result = $showAllUsersObj -> showAllUsers();
                      foreach ($result as $row){
                          $id = $row['idUsers'];
                          $name = $row['usernameUsers'];
                          $email = $row['emailUsers'];
                          $country = $row['countryUsers'];
                          $mobile = $row['contactUsers'];
                          $access = $row['permissionsUsers'];
                          echo '
                          <tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$country.'</td>
                            <td>'.$mobile.'</td>
                            <td>'.$access.'</td>
                            <td>
                            <button type="" class="btn btn-warning btn-round">
                                <a class="text-light" href="edituser.php?updatebutton='.$id.'"><i class="nc-icon nc-align-left-2"></i></a>
                            </button>
                            </td>
                            <td>
                          <button type="" class="btn btn-danger btn-round">
                                <a href="../includes/deleteuser.inc.php?deletebutton='.$id.'"><i class="nc-icon nc-basket"></i></a>
                              </button>
                            </td>
                          </tr>
                          ';
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of User List Table -->

        <!-- SatData Files Table -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> SatData Files </h4>
            <p class="card-category"> Below are the uploaded satdata files</p>
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="../includes/uploadfile.inc.php" method="POST"
              enctype="multipart/form-data">
              <input type="file" name="satfile">
              <button type="submit" class="btn btn-primary" name="upload-button">Upload Sat File</button>
            </form>
            <div class="table-responsive scrollable">
              <table class="table">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Packet Format</th>
                    <th scope="col">Upload Date</th>
                    <th scope="col">Uploader</th>
                    <th scope="col">Delete</th>
                  </tr>
                <tbody>
                  <?php
                    $showAllFilesObj = new SatDataView();
                    $resultFile = $showAllFilesObj -> showAllFiles();
                    foreach ($resultFile as $rowFile){
                        $idFile = $rowFile['idSatDataMeta'];
                        $nameFile = $rowFile['fileNameSatDataMeta'];
                        $dateFile = $rowFile['dateUploadedSatDataMeta'];
                        $uploaderFile = $rowFile['uploaderSatDataMeta'];
                        $dataFile = $rowFile['fileSatDataMeta'];
                        $formatFile = $rowFile ['formatSatDataMeta'];

                        $showUploaderObj = new UsersView();
                        $resultUploader = $showUploaderObj -> showOneUser($uploaderFile);
                        $uploader = $resultUploader[0]['usernameUsers'];

                        echo '
                        <tr>
                          <th scope="row">'.$idFile.'</th>
                          <td><a target="_blank" href=../includes/viewfile.inc.php?fileid='.$idFile.'>'.$nameFile.'</a></td>
                          <td>'.$formatFile .' bytes</td>
                          <td>'.$dateFile.'</td>
                          <td>'.$uploader.'</td>
                          <td>';
                        if ($_SESSION['userPermission'] != 'Admin') {
                          echo '
                            [NO ACCESS]
                          </td>
                          </tr>
                          ';
                        } else {
                          echo '
                          <button type="" class="btn btn-danger btn-round">
                            <a href="../includes/deletefile.inc.php?deletefile='.$idFile.'&filelocation='.$nameFile.'"><i class="nc-icon nc-basket"></i></a>
                          </button>
                          </td>
                        </tr>
                          ';
                        }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of SatDataFile Table -->
      </div>
    </div>

      <?php
  include "footer.php";