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
    $count = 0;  
    //Opens a file in read mode  
    //$file = fopen($nameFile, "r");  
    $file = $nameFile;
    $line = explode("<br />", $file);
    //Gets each line till end of file is reached 
    $words = explode("\t", $line[0]);  
        //Counts each word  
    $count = $count + count($words);  
    
    return $count;  
}


