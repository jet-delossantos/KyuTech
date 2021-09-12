<?php
    include 'functions.inc.php';

if(isset($_POST['sort-submit'])){
        $datafilter = $_POST['datatypefilter'];
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];

        if (emptySortFields($datafilter,$datefrom,$dateto) !== false){
            header('Location: ../pages/satdata.php?query=default&status=emptyfields');
            exit();
        }
        else if (notChronological($datefrom,$dateto) !== false) {
            header('Location: ../pages/satdata.php?query=default&status=dateerror');
            exit();
        } 
        else if ((empty($datefrom) || empty($dateto)) && !empty($datafilter)){
            header('Location: ../pages/satdata.php?query=bydatatype&datatype='.$datafilter.'');
            exit();
        }
        else if (empty($datafilter) && (sameDate($datefrom,$dateto)!== false)){
            header('Location: ../pages/satdata.php?query=ontheday&onday='.$datefrom.'');
            exit();
        }

        else if (!empty($datafilter) && (sameDate($datefrom,$dateto)!== false)){
            header('Location: ../pages/satdata.php?query=datatypeontheday&onday='.$datefrom.'&datatype='.$datafilter.'');
            exit();
        }
        else if (empty($datafilter) && (notChronological($datefrom,$dateto) == false)){
            header('Location: ../pages/satdata.php?query=bydate&from='.$datefrom.'&to='.$dateto.'');
            exit();
        }

        else if ((notChronological($datefrom,$dateto) == false) && !empty($datafilter)){
            header('Location: ../pages/satdata.php?query=byboth&datatype='.$datafilter.'&from='.$datefrom.'&to='.$dateto.'');
            exit();
        }
    }