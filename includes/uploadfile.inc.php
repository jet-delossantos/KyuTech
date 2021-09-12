<?php
    session_start();
    include_once 'classautoloader.inc.php';
    include 'functions.inc.php';

if (isset($_POST['upload-button']) && isset($_FILES['satfile'])) {
    $file = $_FILES['satfile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileError = $file['error'];
    $fileData = nl2br(htmlentities(file_get_contents($_FILES['satfile']['tmp_name'])));
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileFormat = countBytes($fileData);
    $allowed = array('txt');

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = uniqid('',true).".".$fileExt;
            $fileDestination = '../uploadedfiles/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            $dataFileUploaded = date("Y/m/d");
            $uploaderSatDataMeta = $_SESSION['userId'];

            $createSatDataObj = new SatDataController();
            $createSatDataObj-> createSatDataMeta($fileDestination, $fileData, $fileFormat, $dataFileUploaded, $uploaderSatDataMeta);
        } else {
            header("Location:../pages/dashboard.php?status=fileerrorexists");
            exit();
        }
    } else {
        header("Location:../pages/dashboard.php?status=extensionerror");
        exit();
    }
} else {
    header("Location:../pages/dashboard.php?status=nofileselected");
        exit();
}