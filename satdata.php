<?php
      include 'header.php';
      if (!isset($_SESSION['userId'])){
        header('Location:index.php');
      }
?>
    
    <div class="container px-10 mt-5 table-responsive ">

    <form action="">
    <h2 class="text-center">FILTER DATA</h2>
    <p class = "my-0">Data Type Filter</p>
    <div class="input-group mb-3">
        <input type="text" class="form-control" list="datatype" placeholder="Choose Data Type">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Add More Data Types</button>
        </div>
            <datalist id="datatype">

                    <option value="01">
                    <option value="02">
                    <option value="03">
                    <option value="04">
                    <option value="05">    
                    <option value="06">
                    <option value="07">
                    <option value="08">
                    <option value="09">
                    <option value="0A">
                    <option value="0B">
                    <option value="0C">
                    <option value="0D">
                    <option value="0E">
                    <option value="0F">
                    <option value="21">
                    <option value="22">
                    <option value="23">
            </datalist>
    </div>  
    
    
    <p class = "my-0">Date Filter</p>
    <div class="row form-group">
                <label for="date" class="col-sm-1 col-form-label">FROM:</label>
                <div class="col-sm-4">   
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="datefrom">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>


            <div class="row form-group">
                <label for="date" class="col-sm-1 col-form-label">TO:</label>
                <div class="col-sm-4">   
                    <div class="input-group date" id="datepicker1">
                        <input type="text" class="form-control" name="dateto">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

    <hr>

    <h2 class="text-center"> SAT DATA TABLE</h2>
        <button class="btn btn-primary mx-10" onclick="showTableData()">DOWNLOAD .txt FILE</button>
        
        <p class = "my-0"><br></p>
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

    $(function(){
        $('#datepicker').datepicker();
    });

    $(function(){
        $('#datepicker1').datepicker();
    });

</script>