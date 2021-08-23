<?php
include_once 'classautoloader.inc.php';

if (isset($_GET['deletebutton'])) {
    $id = $_GET['deletebutton'];
    $deleteUserObj = new UsersController();
    $deleteUserObj -> removeUser($id);
}