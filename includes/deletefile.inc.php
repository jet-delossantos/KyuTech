<?php
include_once 'classautoloader.inc.php';

if (isset($_GET['deletefile']) && isset($_GET['filelocation']) ) {
    $id = $_GET['deletefile'];
    $filelocation = $_GET['filelocation'];

    $deleteFileObj = new SatDataController();
    $deleteFileObj -> removeFile($id,$filelocation);
}