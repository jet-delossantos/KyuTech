<?php
      include 'header.php';
      if (!isset($_SESSION['userId'])){
        header('Location:index.php');
      }
?>

    <div class="container px-10 mt-5 table-responsive ">
        <button class="btn btn-primary mx-10" onclick="showTableData()">DOWNLOAD</button>
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
                        $gst = getGst($country);
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
                        $finaldate = $rowBytes ['datetimeSatData'];
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
        <p id="info"></p>
    </div>  


<!-- FUNCTIONS FOR DOWNLOADING TABLE DATA -->
<script>
    function showTableData() {
        document.getElementById('info').innerHTML = "";
        var myTab = document.getElementById('example');
        var textFile = "";

        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i < myTab.rows.length; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 2; j < objCells.length; j++) {

                textFile = textFile + objCells.item(j).innerHTML;
                //info.innerHTML = info.innerHTML + ' ' + objCells.item(j).innerHTML;
            }
            // ADD A BREAK (TAG).
            textFile = textFile + '\n';
            
        }
        nameFile = String(Date.now())+'.txt';
        download(nameFile, textFile);
    }

    function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();

        document.body.removeChild(element);
    }
</script>