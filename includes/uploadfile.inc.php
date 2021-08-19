<?php

if (isset($_POST['upload-button'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('txt','pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = '../testfiles/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            header("Location:../dashboard.php?status=fileuploadsuccess");
        } else {
            echo 'Error uploading file';
        }
    } else {
        echo 'File type not accepted';
    }
}