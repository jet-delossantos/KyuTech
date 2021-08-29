<?php
      include 'header.php';
?>

    <div class="container px-10 mt-5 table-responsive ">
        <button onclick=""class="btn btn-primary mx-10">DOWNLOAD</button>
        <button onclick="history.go(-1)"class="btn btn-primary mx-10">Back</button>
        <table id="example" class="table table-striped table-bordered table-wrapper-scroll-y my-custom-scrollbar" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date/Time</th>
                    <th>GST</th>
                    <th>DataType</th>
                    <th>Time</th>
                    <th>Sensor</th>
                    <th>Checksum</th>
                </tr>
            </thead>
            <tbody>    
            <?php
                    if ($_SESSION['userPermission'] == 'Admin'){
                        $showAllBytesObj = new SatDataView();
                        $resultBytes = $showAllBytesObj -> showAllBytes(); 
                    } else {
                        $country = $_SESSION['userCountry'];
                        switch ($country) {
                            case "Kyutech":
                              $gst='01';
                              break;
                            case "Ghana":
                              $gst='02';
                              break;
                            case "Nigeria":
                              $gst='03';
                              break;
                            case "Mongolia":
                              $gst='04';
                              break; 
                            case "Bangladesh":
                              $gst='05';
                              break;
                            case "Thailand":
                              $gst='06';
                              break;
                            case "Taiwan":
                              $gst='07';
                              break;
                            case "Bhutan":
                              $gst='08';
                              break;
                            case "Malaysia":
                              $gst='09';
                              break;
                            case "Philippines":
                              $gst='0A';
                              break ;
                            case "Sri Lanka":
                              $gst='0B';
                              break; 
                            case "Nepal":
                              $gst='0C';
                              break; 
                            case "Costa Rica":
                              $gst='0D';
                              break; 
                            case "Paraguay":
                              $gst='0E';
                              break; 
                            case "Argentina":
                              $gst='0F';
                              break; 
                            case "Sudan":
                              $gst='10';
                              break; 
                            case "Zimbabwe":
                              $gst='11';
                              break; 
                            case "Uganda":
                              $gst='12';
                              break;   
                            default:
                              $gst = '01';
                          }
                        $showAllBytesObj = new SatDataView();
                        $resultBytes = $showAllBytesObj -> showAllBytesByGst($gst); 
                    }
                    
                    foreach ($resultBytes as $rowBytes){
                        $idByte = $rowBytes['idSatData'];
                        $timestamp = $rowBytes['datetimeSatData'];
                        $gstByte = $rowBytes['gstidSatData'];
                        $datatypeByte = $rowBytes['datatypeSatData'];
                        $timeByte = $rowBytes['timeSatData'];
                        $sensorByte = $rowBytes['sensorSatData'];
                        $checksumByte = $rowBytes ['checksumSatData'];

                        $finaldate = date("Y-m-d", strtotime("+51 year", $timestamp));
                        echo '
                        <tr>
                            <td>'. $idByte .'</td>
                            <td>'.$finaldate.'</td>
                            <td>'. $gstByte.'</td>
                            <td>'.$datatypeByte.'</td>
                            <td>'.$timeByte.'</td>
                            <td>'.$sensorByte.'</td>
                            <td>'.$checksumByte.'</td>
                        </tr>
                        ';
                    }
            ?>
        </table>
    </div>  
