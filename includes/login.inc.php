<?php
include 'classautoloader.inc.php';
include 'functions.inc.php';

if(isset($_POST['login-submit'])){
    $username = $_POST['username'];
    $password = $_POST['pwd'];
  
    //ERROR HANDLER FUNCTIONS!!!!
        //Checking for empty fields in login page
    if (emptyLoginFields($username,$password) !== false){
        header('Location:../index.php?status=emptyfields&username='.$username);
        exit();
    } else {
        $loginUserObj = new UsersView();
        $loginUserObj -> checkLoginUser($username,$password);
    }
  }
