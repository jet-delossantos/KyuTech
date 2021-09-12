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
            header('Location:../pages/adduser.php?status=emptyfields');
            exit();
        }
        if (invalidUsername($username) !== false){
            header('Location:../pages/adduser.php?status=invalidusername');
            exit();
        }
        if (invalidEmail($email) !== false){
            header('Location:../pages/adduser.php?status=invalidemail');
            exit();
        }
        if (passwordMatch($password,$repeatpassword) !== false){
            header('Location:../pages/adduser.php?status=passwordsmatcherror');
            exit();
        }
        if (usernameExists($username) !== false){
            header('Location:../pages/adduser.php?status=usernametaken');
            exit();
        }
        else{
            $createUserObj = new UsersController();
            $createUserObj-> insertUser($username, $email, $password, $country, $contact );

        }
    } else {
        header('Location:../pages/dashboard.php?status=invalidurlaccess');
        exit();
    }