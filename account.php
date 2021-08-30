<?php

    include 'header.php';
    if (!isset($_SESSION['userId'])){
      header('Location:index.php');
    }
    
    // $newEpoch = strtotime('2020-12-30 0:00:00');
    // echo $newEpoch;



    $dec = hexdec('0018A0D1');
    //echo (((float)$dec + 3818448000)/86400)-2;
    echo ((float)$dec + 3818448000)-2 . '<br/>';
    // $intdec = (((int)$dec+$newEpoch+3818448000)/86400);
    // echo date("Y-m-d H:i:s", $intdec);
    // $date = new DateTime();
    // date_default_timezone_set('America/New_York');
    // echo $date->format('U = Y-m-d H:i:s') . "<br/>";

    // $newEpoch = strtotime('2020-12-30 0:00:00');
    // echo $newEpoch . "<br/>";

    // $date->setTimestamp(1609282800);
    // echo $date->format('U = Y-m-d H:i:s') . "\n";

    // echo date("Y-m-d H:i:s", 44213.68094 + 18869.18);

    // <?php

function secs2date($secs,$date)
    {
    if ($secs>2147472000)    //2038-01-19 expire dt
        {
        $date->setTimestamp(1262277040);
        $s=$secs-2147472000;
        $date->add(new DateInterval('PT'.$s.'S'));
        }
    else
        $date->setTimestamp($secs);
    }

// function date2secs($date,$datebeg)
//     {
//     $diff = $datebeg->diff($date);
//     $secs=$diff->format('%a') * (60*60*24);  //total days
//     $secs+=$diff->format('%h') * (60*60);     //hours
//     $secs+=$diff->format('%i') * 60;              //minutes
//     $secs+=$diff->format('%s');                     //seconds
//     return $secs;
//     }

// $datebeg = new DateTime('2020-01-01');
// $date=new dateTime();

// $secs=44000;  //2033-12-06 08:53:20
// secs2date($secs,$date);
// $dt=$date->format('Y-m-d H:i:s');
// echo $dt."<br>";
// $sec2=date2secs($date,$datebeg);
// echo '(1) ',$sec2,'***',$secs,'<br>';

// $secs=2397472000; //2045-12-21 12:26:40
// secs2date($secs,$date);
// $dt=$date->format('Y-m-d H:i:s');
// echo $dt."<br>";
// $sec2=date2secs($date,$datebeg);
// echo '(2) ',$sec2,'***',$secs,'<br>';
$date=new dateTime();
// $secs= 44000 + 1262277040;  //2033-12-06 08:53:20
// $secs = 1614033 + 1609403226;
$secs = 3818448000/8860;
secs2date($secs,$date);
$dt=$date->format('m-d-Y H:i:s');
echo $dt."<br>";
echo time();
?>