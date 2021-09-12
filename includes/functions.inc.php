<?php
include_once 'classautoloader.inc.php';

//********************* FUNCTIONS FOR LOGINPAGE *************************//
    //Checking for empty fields

function emptyLoginFields($username,$password) {
    if(empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


//****************** FUNCTIONS FOR REGISTER PAGE ****************************//

    //Checking for empty fields
function emptyFields($username,$email,$country,$contact,$password,$repeatpassword) {
    if(empty($username) || empty($email || empty($country)) || empty($contact) || empty($password)|| empty($repeatpassword)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

    //Checking for valid username entry na dapat alphanumeric lang walang symbols
function invalidUsername($username) {
    if(!preg_match('/^[a-zA-Z0-9]*$/',$username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

    //Checking kung valid ang email na nilagay aka may '@' at '.com' ata
function invalidEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

    //Checking kung parehong password ang nilagay
function passwordMatch($password,$repeatpassword) {
    if($password != $repeatpassword){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

    //Checking the database kung meron ng same ang username
function usernameExists($username) {

    $userExistsObj = new UsersView();
    $row = $userExistsObj -> showUser($username);

    if($row > 0){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

    //(UNDER CONSTRUCTION) Checking if may same email na sa database
function emailExists() {
    
}

//********************* FUNCTIONS FOR LOGINPAGE *************************//

    //Checking for empty fields
  function emptySortFields($datatypefilter,$datefrom,$dateto) {
      if(empty($datatypefilter) && empty($datefrom) && empty($dateto) || empty($dateto) && !empty($datefrom) || empty($datefrom) && !empty($dateto)) {
          $result = true;
      }
      else {
          $result = false;
      }
      return $result;
  }

    //Checking for chronological dates
  function notChronological($datefrom,$dateto) {
      $fromtimestamp = strtotime($datefrom);
      $totimestamp = strtotime($dateto);
      if($fromtimestamp>$totimestamp) {
          $result = true;
      }
      else {
          $result = false;
      }
      return $result;
  }

  function sameDate($datefrom,$dateto) {
    $fromtimestamp = strtotime($datefrom);
    $totimestamp = strtotime($dateto);
    if($fromtimestamp == $totimestamp) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


//********************* MISC FUNCTIONS *************************//
function countBytes($nameFile) {

    //Opens a file in read mode  
    $file = $nameFile;
    $line = explode("<br />", $file);
    //Gets each line till end of file is reached 
    $words = explode("\t", $line[0]);  
        //Counts each word  
    $count = count($words);  
    
    return $count;  
}

function convertHexTime($hextime){
    $hextime = str_replace("\t","",$hextime);
    $secs = hexdec('0018A0D1');
    $timestamp = ((float)$secs + 3818448000)-2;
    return $timestamp;
}

function getGst($country) {
    switch ($country) {
        case "Kyutech":
          $gst='01';
          break;
        case "Ghana":
          $gst='02';
          break;
        case "Nigeria":
          $gst='03';
          break;
        case "Mongolia":
          $gst='04';
          break; 
        case "Bangladesh":
          $gst='05';
          break;
        case "Thailand":
          $gst='06';
          break;
        case "Taiwan":
          $gst='07';
          break;
        case "Bhutan":
          $gst='08';
          break;
        case "Malaysia":
          $gst='09';
          break;
        case "Philippines":
          $gst='0A';
          break ;
        case "Sri Lanka":
          $gst='0B';
          break; 
        case "Nepal":
          $gst='0C';
          break; 
        case "Costa Rica":
          $gst='0D';
          break; 
        case "Paraguay":
          $gst='0E';
          break; 
        case "Argentina":
          $gst='0F';
          break; 
        case "Sudan":
          $gst='10';
          break; 
        case "Zimbabwe":
          $gst='11';
          break; 
        case "Uganda":
          $gst='12';
          break;   
        default:
          $gst = '01';
        }
    return $gst;
}

function identifyToastStatus ($status) {
  switch ($status) {
    case "invalidurlaccess":
      echo '<body onload = "showToast(\'top\',\'right\',\'danger\',\'Invalid URL Access!\');">';
      break;
    case "loginsuccess":
      echo '<body onload = "showToast(\'top\',\'right\',\'primary\',\'Login Successful!\');">';
      break;
    case "loginfailed":
      echo '<body onload = "showToast(\'top\',\'right\',\'warning\',\'Login Failed!\');">';
      break;
    case "logoutsuccess":
      echo '<body onload = "showToast(\'top\',\'right\',\'primary\',\'Logout Successful!\');">';
      break;
    case "registersuccess":
      echo '<body onload = "showToast(\'top\',\'right\',\'primary\',\'Register Successful!\');">';
      break;
    case "registerfailed":
      echo '<body onload = "showToast(\'top\',\'right\',\'warning\',\'Register Failed. Please Try Again.\');">';
      break;
    case "emptyfields":
      echo '<body onload = "showToast(\'top\',\'right\',\'warning\',\'Complete all fields!\');">';
      break;
    case "passwordsmatcherror":
      echo '<body onload = "showToast(\'top\',\'right\',\'warning\',\'Your passwords do not match\');">';
      break;
    case "usernametaken":
      echo '<body onload = "showToast(\'top\',\'right\',\'danger\',\'Username is already taken\');">';
      break;
    case "wrongpassword":
      echo '<body onload = "showToast(\'top\',\'right\',\'danger\',\'Password is incorrect\');">';
      break;
    case "fileuploadsuccess":
      echo '<body onload = "showToast(\'top\',\'right\',\'info\',\'File uploaded\');">';
      break;
    case "extensionerror":
      echo '<body onload = "showToast(\'top\',\'right\',\'danger\',\'Wrong file type. Upload <b>.txt</b> files only.\');">';
      break;
    case "fileuploadfailed":
      echo '<body onload = "showToast(\'top\',\'right\',\'danger\',\'File upload error.\');">';
      break;
    default:
      echo '<body>';
    }
}
?>
