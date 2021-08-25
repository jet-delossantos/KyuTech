<?php
      include 'header.php';
?>

<!-- SUPER KULANG PA NG FUNCTIONALITY AT SEARCH OPTIONS -->
<!-- AT JAVASCRIPT MAGIC. DI KO PA NAGAGAWAN -->
    <script src="cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" 
            crossorigin="anonymous"></script>
    
    <link href="cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css " 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    <div class="container mt-5 pr-50">

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>GST</th>
                <th>Time</th>
                <th>Sensor</th>
                <th>Checksum</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
            </tr>
            <tr>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
            </tr>
            <tr>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
                <td>00h</td>
            </tr>
        </tfoot>
    </table>
    <button onclick="history.go(-1)"class="btn btn-primary">Back</button>
    </div>
    