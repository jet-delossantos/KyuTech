<?php
include_once 'classautoloader.inc.php';

//FUNCTIONS FOR LOGINPAGE
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
//FUNCTIONS FOR REGISTER PAGE
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