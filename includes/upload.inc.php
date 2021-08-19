<?php

if (isset($_POST['upload-button'])) {
    $file = $_FILE['file'];
    $fileName = $file['name'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('txt','pdf')

    if (in_array($fileActualExt, $allowed)) {

    } e
}