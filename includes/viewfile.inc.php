<?php
include_once 'classautoloader.inc.php';


if (isset($_GET['fileid'])){
    $fileId = $_GET['fileid'];

    $showOneFilesObj = new SatDataView();
    $result = $showOneFilesObj -> showOneFile($fileId);
    echo $result[0]['fileSatDataMeta'];
}