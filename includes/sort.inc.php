<?php
    include 'functions.inc.php';

if(isset($_POST['sort-submit'])){
        $datafilter = $_POST['datatypefilter'];
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];

        if (emptySortFields($datafilter,$datefrom,$dateto) !== false){
            header('Location: ../satdata.php?query=default&status=emptyfields');
            exit();
        }
        if (empty($datafilter) && (sameDate($datafrom,$dateto)!== true)){
            header('Location: ../satdata.php?query=ontheday&onday='.$datefrom.'');
            exit();
        }
        if (!empty($datafilter) && (sameDate($datafrom,$dateto)!== true)){
            header('Location: ../satdata.php?query=datatypeontheday&onday='.$datefrom.'&datatype='.$datafilter.'');
            exit();
        }
        if (notChronological($datafrom,$dateto) !== false) {
            header('Location: ../satdata.php?query=default&status=dateerror');
            exit();
        } 
        if (empty($datafilter) && (notChronological($datefrom,$dateto) == false)){
            header('Location: ../satdata.php?query=bydate&from='.$datefrom.'&to='.$dateto.'');
            exit();
        }
        if ((empty($datefrom) || empty($dateto)) && !empty($datafilter)){
            header('Location: ../satdata.php?query=bydatatype&datatype='.$datafilter.'');
            exit();
        }
        if ((notChronological($datefrom,$dateto) == false) && !empty($datafilter)){
            header('Location: ../satdata.php?query=byboth&datatype='.$datafilter.'&from='.$datefrom.'&to='.$dateto.'');
            exit();
        }
    }