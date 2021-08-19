<?php

if (isset($_POST['upload-button'])) {
    $file = $_FILE['file'];
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('txt','pdf')

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = uniqid('',true);
        } else {
            echo 'Error uploading file';
        }
    } else {
        echo 'File type not accepted';
    }
}