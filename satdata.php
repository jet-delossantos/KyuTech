<?php
      include 'header.php';
?>

    <div class="container py-10 px-10 mt-5">

    </div>

    <div class="container px-10 mt-5 table-responsive ">
        <button onclick=""class="btn btn-primary pb-10">Print</button>
        <button onclick="history.go(-1)"class="btn btn-primary">Back</button>
        <table id="example" class="table table-striped table-bordered table-wrapper-scroll-y my-custom-scrollbar" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>GST</th>
                    <th>DataType</th>
                    <th>Time</th>
                    <th>Sensor</th>
                    <th>Checksum</th>
                </tr>
            </thead>
            <tbody id="myTable">    
            <?php
                    $showAllBytesObj = new SatDataView();
                    $resultBytes = $showAllBytesObj -> showAllBytes();
                    
                    foreach ($resultBytes as $rowBytes){
                        $idByte = $rowBytes['idSatData'];
                        $gstByte = $rowBytes['gstidSatData'];
                        $datatypeByte = $rowBytes['datatypeSatData'];
                        $timeByte = $rowBytes['timeSatData'];
                        $sensorByte = $rowBytes['sensorSatData'];
                        $checksumByte = $rowBytes ['checksumSatData'];
                        echo '
                        <tr>
                            <td>'. $idByte .'</td>
                            <td>'. $gstByte.'</td>
                            <td>'.$datatypeByte.'</td>
                            <td>'.$timeByte.'</td>
                            <td>'.$sensorByte.'</td>
                            <td>'.$checksumByte.'</td>
                        </tr>
                        ';
                    }
            ?>
            </tfoot>
        </table>
    </div>  

    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>