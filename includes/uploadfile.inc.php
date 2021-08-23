<?php
    session_start();
    include_once 'classautoloader.inc.php';

if (isset($_POST['upload-button']) && isset($_FILES['satfile'])) {
    $file = $_FILES['satfile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileError = $file['error'];
    $fileData = file_get_contents($_FILES['satfile']['tmp_name']);

    // $fileExt = explode('.', $fileName);
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    //$fileActualExt = strtolower(end($fileExt));

    $allowed = array('txt','pdf');

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = uniqid('',true).".".$fileExt;
            $fileDestination = '../testfiles/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            $dataFileUploaded = date("Y/m/d");
            $uploaderSatDataMeta = $_SESSION['userId'];

            $createSatDataObj = new SatDataController();
            $createSatDataObj-> createSatDataMeta($fileDestination, $fileData, $dataFileUploaded, $uploaderSatDataMeta);
        } else {
            header("Location:../dashboard.php?status=fileuploadfailed");
            exit();
        }
    } else {
        header("Location:../dashboard.php?status=extensionerror");
        exit();
    }
} else {
    header("Location:../dashboard.php?status=nofileselected");
        exit();
}