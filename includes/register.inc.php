<?php

    include_once 'classautoloader.inc.php';
    include 'functions.inc.php';

    if(isset($_POST['register-submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $contact = $_POST['contact'];
        $password = $_POST['pwd'];
        $repeatpassword = $_POST['re-pwd'];

        //ERROR HANDLER FUNCTIONS!!!!
        if (emptyFields($username, $email, $country,$contact,$password,$repeatpassword) !== false){
            header('Location:../register.php?status=emptyfields');
            exit();
        }
        if (invalidUsername($username) !== false){
            header('Location:../register.php?status=invalidusername');
            exit();
        }
        if (invalidEmail($email) !== false){
            header('Location:../register.php?status=invalidemail');
            exit();
        }
        if (passwordMatch($password,$repeatpassword) !== false){
            header('Location:../register.php?status=passwordsmatcherror');
            exit();
        }
        if (usernameExists($username) !== false){
            header('Location:../register.php?status=usernametaken');
            exit();
        }
        else{
            $createUserObj = new UsersController();
            $createUserObj-> createUser($username, $email, $password, $country, $contact );

        }
    } else {
        header('Location:../index.php?status=invalidurlaccess');
        exit();
    }