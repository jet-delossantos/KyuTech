<?php

    include 'header.php';
    if (!isset($_SESSION['userId'])){
      header('Location:index.php');
    }
    
?>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
<body class>
<div class="md-form">
  <input placeholder="Selected date" type="text" id="datepicker" class="form-control datepicker">
  <label for="date-picker-example">Try me...</label>
</div>
</body>

<script type="text/javascript">
    // Data Picker Initialization
$('.datepicker').pickadate();

</script>