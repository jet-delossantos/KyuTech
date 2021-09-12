<!-- DO NOT BE CONFUSED. ACTION LANG TO PARA HINDI NA LAGI NAG CALL
     EACH PAGE NG CLASS PHP FILES. MATIC NA BA AS LONG AS SAME ANG 
     NAME NG CLASS AT NUNG CLASS FILE -->
     
<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url,'../includes') !== false) {
        $path = '.../classes/';
    } else {
        $path = '../classes/';
    }
    $extension = '.class.php';
    require_once $path . $className . $extension;
}