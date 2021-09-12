<?php
    session_start();
    include_once '../includes/classautoloader.inc.php';
    include '../includes/functions.inc.php';

    if (isset($_GET['status'])){
      $status = $_GET['status'];
    } else {
      $status = "";
    }
?>
<script>
  var text = <?php echo $status; ?>
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    KyuTech Satellite Data
  </title>
  <link rel="stylesheet" href="../assets/css/stylesheet.css">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso12.css" /> 

  <!-- Inline CSS based on choices in "Settings" tab -->
  <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
  <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
                <!-- Include jQuery -->
                <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

                <!-- Include Date Range Picker -->
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</head>

<?php
  identifyToastStatus ($status);
?>
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/default-avatar.png">
          </div>
        </a>
        <a class="simple-text logo-normal"> User:
            <?php
                if (isset($_SESSION['userUsername'])) {
                  echo $_SESSION['userUsername'];
                }
            ?> 
          </a>
        </div>

      