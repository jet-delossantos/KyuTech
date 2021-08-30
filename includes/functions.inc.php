<?php
include_once 'classautoloader.inc.php';

//FUNCTIONS FOR LOGINPAGE
    //Checking for empty fields
function emptyLoginFields($username,$password) {
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


//******************FUNCTIONS FOR REGISTER PAGE****************************//

    //Checking for empty fields
function emptyFields($username,$email,$country,$contact,$password,$repeatpassword) {
    $result;
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
    $result;
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
    $result;
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
    $result;
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
    $result;

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