<!-- Header -->
<?php
  include "header.php";

      if (!isset($_SESSION['userId'])){
        header('Location:index.php');
      }

      if (isset($_GET['query'])){
        $query = $_GET['query'];
        if ($query == 'bydate') {
            $dateFrom = $_GET['from'];
            $newDateFrom = date("Y-m-d", strtotime($dateFrom));
            $dateTo = $_GET['to'];
            $newDateTo = date("Y-m-d", strtotime($dateTo));
        } else if ($query == 'bydatatype') {
            $datatype = $_GET['datatype'];
        } else if ($query == 'byboth') {
            $dateFrom = $_GET['from'];
            $newDateFrom = date("Y-m-d", strtotime($dateFrom));
            $dateTo = $_GET['to'];
            $newDateTo = date("Y-m-d", strtotime($dateTo));
            $datatype = $_GET['datatype'];
        } else if ($query == 'ontheday') {
            $dateOn = $_GET['onday'];
            $newDateOn = date("Y-m-d", strtotime($dateOn));
        } else if ($query == 'datatypeontheday') {
            $dateOn = $_GET['onday'];
            $datatype = $_GET['datatype'];
            $newDateOn = date("Y-m-d", strtotime($dateOn));
        }
      }
?>
<!-- Sidebar Navigation -->
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
    <li class="active">
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
    <li>
      <a href="./about.php">
        <i class="nc-icon nc-email-85"></i>
        <p>About Us</p>
      </a>
    </li>
  </ul>
</div>
</div>
<!-- End of Sidebar Navigation -->
<div class="main-panel" style="height: 100vh;">
  <!-- Top Navbar -->
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
        <a class="navbar-brand" href="javascript:;">SatData</a>
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
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End of Top Navbar -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- Filter Form -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Filter Options</h4>
          </div>
          <div class="card-body">
            <form action="../includes/sort.inc.php" method="post">
              <div class="row">
                <div class="bootstrap-iso">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group ">
                          <label class="control-label">
                            Date From:
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-check-o">
                              </i>
                            </div>
                            <input class="form-control" name="datefrom" placeholder="MM/DD/YYYY" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(document).ready(function () {
                    var date_input = $('input[name="datefrom"]');
                    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() :
                      "body";
                    date_input.datepicker({
                      format: 'mm/dd/yyyy',
                      container: container,
                      todayHighlight: true,
                      autoclose: true,
                    })
                  })
                </script>
              </div>
              <div class="row">
                <div class="bootstrap-iso">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group ">
                          <label for="dateto">
                            Date To:
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-check-o">
                              </i>
                            </div>
                            <input class="form-control" name="dateto" placeholder="MM/DD/YYYY" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(document).ready(function () {
                    var date_input = $('input[name="dateto"]');
                    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() :
                      "body";
                    date_input.datepicker({
                      format: 'mm/dd/yyyy',
                      container: container,
                      todayHighlight: true,
                      autoclose: true,
                    })
                  })
                </script>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Data Type</label>
                    <input type="text" name="datatypefilter" class="form-control" placeholder="Choose Data Type"
                      list="datatype">
                    <datalist id="datatype">
                      <option value="01">
                      <option value="02">
                      <option value="03">
                      <option value="04">
                      <option value="05">
                      <option value="06">
                      <option value="07">
                      <option value="08">
                      <option value="09">
                      <option value="0A">
                      <option value="0B">
                      <option value="0C">
                      <option value="0D">
                      <option value="0E">
                      <option value="0F">
                      <option value="21">
                      <option value="22">
                      <option value="23">
                      <option value="5C">
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Packet Format</label>
                    <input type="text" name="packetformat" class="form-control" placeholder="Choose Packet Format"
                      list="packetformat">
                    <datalist id="packetformat">
                      <option value="16 bit">
                      <option value="32 bit">
                    </datalist>
                  </div>
                </div>
              </div>
              <button class="btn btn-warning" name='sort-submit' type="submit">Sort</button>
              <button type="button" class="btn btn-primary"><a class="text-light"
                  href="satdata.php?query=default">Reset</a></button>
            </form>
          </div>
        </div>
        <!-- End of Filter Form -->
        <!-- SatData Bytes Table -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> SatData Table</h4>
            <p class="card-category"> Showing satdata values based on your GST</p>
            <button class="btn btn-primary mx-10" onclick="showTableData()">DOWNLOAD .txt FILE</button>
          </div>
          <div class="card-body">
            <div class="table-responsive scrollable">
              <table id="example" class="table-fixed table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Date/Time</th>
                    <th>GST</th>
                    <th>DataType</th>
                    <th>Time</th>
                    <th>Sensor</th>
                    <th>Checksum</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                              if ($_SESSION['userPermission'] == '0'){
                                  if ($query == "default"){ 
                                      $argumentslist[0] = "0";              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytes($argumentslist); 
                                  }
                                  else if ($query == "bydate") {
                                      $argumentslist[0] = "1";
                                      array_push($argumentslist, $newDateFrom , $newDateTo);
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytes($argumentslist);
                                  }
                                  else if ($query == "bydatatype") {
                                      $argumentslist[0] = "2";
                                      array_push($argumentslist, $datatype);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytes($argumentslist);
                                  }
                                  else if ($query == "byboth") {
                                      $argumentslist[0] = "3";
                                      array_push($argumentslist, $datatype, $newDateFrom , $newDateTo);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytes($argumentslist);
                                  } else if ($query == "ontheday") {
                                      $argumentslist[0] = "4";
                                      array_push($argumentslist, $newDateOn);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytes($argumentslist);
                                  } else if ($query == "datatypeontheday") {
                                      $argumentslist[0] = "5";
                                      array_push($argumentslist, $datatype, $newDateOn);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytes($argumentslist);
                                  } 
                              } else {
                                  if ($query == "default"){
                                      $argumentslist[0] = "0";
                                      $country = $_SESSION['userCountry'];
                                      $gst = getGst($country);
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst,$argumentslist); 
                                  }
                                  else if ($query == "bydate") {
                                      $argumentslist[0] = "1";
                                      $country = $_SESSION['userCountry'];
                                      $gst = getGst($country);
                                      array_push($argumentslist, $newDateFrom , $newDateTo);
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst,$argumentslist);
                                  }
                                  else if ($query == "bydatatype") {
                                      $argumentslist[0] = "2";
                                      $country = $_SESSION['userCountry'];
                                      $gst = getGst($country);
                                      array_push($argumentslist, $datatype);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst,$argumentslist);
                                  }
                                  else if ($query == "byboth") {
                                      $argumentslist[0] = "3";
                                      $country = $_SESSION['userCountry'];
                                      $gst = getGst($country);
                                      array_push($argumentslist, $datatype, $newDateFrom , $newDateTo);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst,$argumentslist);
                                  } else if ($query == "ontheday") {
                                      $argumentslist[0] = "4";
                                      $country = $_SESSION['userCountry'];
                                      $gst = getGst($country);
                                      array_push($argumentslist, $newDateOn);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst,$argumentslist);
                                  } else if ($query == "datatypeontheday") {
                                      $argumentslist[0] = "5";
                                      $country = $_SESSION['userCountry'];
                                      $gst = getGst($country);
                                      array_push($argumentslist, $datatype, $newDateOn);              
                                      $showAllBytesObj = new SatDataView();
                                      $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst,$argumentslist);
                                  }
                              }   
                              foreach ($resultBytes as $rowBytes){
                                  $idByte = $rowBytes['idSatData'];
                                  $timestamp = $rowBytes['datetimeSatData'];
                                  $gstByte = $rowBytes['gstidSatData'];
                                  $datatypeByte = $rowBytes['datatypeSatData'];
                                  $timeByte = $rowBytes['timeSatData'];
                                  $sensorByte = $rowBytes['sensorSatData'];
                                  $checksumByte = $rowBytes ['checksumSatData'];
                                  $finaldate = $rowBytes ['datetimeSatData'];
                                  echo '
                                  <tr>
                                      <td>'. $idByte .'</td>
                                      <td>'.$finaldate.'</td>
                                      <td>'. $gstByte.'</td>
                                      <td>'.$datatypeByte.'</td>
                                      <td>'.$timeByte.'</td>
                                      <td>'.$sensorByte.'</td>
                                      <td>'.$checksumByte.'</td>
                                  </tr>
                                  ';
                              }
                      ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of SatData Bytes Table -->
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
    include "footer.php";