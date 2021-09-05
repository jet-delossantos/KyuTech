<?php

    include 'header.php';
    if (!isset($_SESSION['userId'])){
      header('Location:index.php');
    }
    
?>

<body>
  <button class="btn btn-primary mx-10" onclick="downTableData()">DOWNLOAD .txt FILE</button>
  <div class="optionsDiv">
    Filter By Position
    <select id="selectField">
      <option value="All" selected>All</option>
      <option value="Student">Student</option>
      <option value="Assistant">Assistant</option>
      <option value="Professor">Professor</option>

    </select>

  </div>
  <table id="myTable">
    <tr id="HeadRow">
      <td>First Name</td>
      <td>Last Name</td>
      <td>Age</td>
      <td>Position</td>
    </tr>

    <tr position="Student">
      <td>John</td>
      <td>John's Last name</td>
      <td>25</td>
      <td>Student</td>
    </tr>

    <tr position="Assistant">
      <td>Timmy</td>
      <td>Timmy's Last name</td>
      <td>22</td>
      <td>Assistant</td>
    </tr>

    <tr position="Professor">
      <td>Billy</td>
      <td>Billy's Last name</td>
      <td>40</td>
      <td>Professor</td>
    </tr>

    <tr position="Professor">
      <td>Eddy</td>
      <td>Eddy's Last name</td>
      <td>35</td>
      <td>Professor</td>
    </tr>

    <tr position="Professor">
      <td>Emma</td>
      <td>Emma's Last name</td>
      <td>38</td>
      <td>Professor</td>
    </tr>

    <tr position="Student">
      <td>Emily</td>
      <td>Emily's Last name</td>
      <td>20</td>
      <td>Student</td>
    </tr>

    <tr position="Assistant">
      <td>Jack</td>
      <td>Jack's Last name</td>
      <td>30</td>
      <td>Assistant</td>
    </tr>

    <tr position="Student">
      <td>Robert</td>
      <td>Robert's Last name</td>
      <td>20</td>
      <td>Student</td>
    </tr>

    <tr position="Assistant">
      <td>Danny</td>
      <td>Danny's Last name</td>
      <td>37</td>
      <td>Assistant</td>
    </tr>

    <tr position="Professor">
      <td>Erick</td>
      <td>Erick's Last name</td>
      <td>42</td>
      <td>Professor</td>
    </tr>
  </table>

  <div class="col-md-4">
    <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','left')">Top Left</button>
  </div>
</body>

<script>



  $(document).ready(function () {

    function addRemoveClass(theRows) {

      theRows.removeClass("odd even");
      theRows.filter(":odd").addClass("odd");
      theRows.filter(":even").addClass("even");
    }

    var rows = $("table#myTable tr:not(:first-child)");

    addRemoveClass(rows);


    $("#selectField").on("change", function () {

      var selected = this.value;

      if (selected != "All") {

        rows.filter("[position=" + selected + "]").show();
        rows.not("[position=" + selected + "]").hide();
        var visibleRows = rows.filter("[position=" + selected + "]");
        addRemoveClass(visibleRows);
      } else {

        rows.show();
        addRemoveClass(rows);

      }

    });
  });



  function downTableData() {
    var myTab = document.getElementById('myTable');
    var textFile = "";
    var csv = [];
    var rows = document.querySelectorAll("myTable tr:visible")
    //var Tabrows = $("myTable tr:visible");
    for (var i = 0; i < rows.length; i++) {
      var row = [],
        cols = rows[i].querySelectorAll("td, th");

      for (var j = 0; j < cols.length; j++)
        row.push(cols[j].innerText);

      csv.push(row.join("\t"));
    }

    // Download CSV
    download_csv(csv.join("\n"), filename);
    // // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
    // for (i = 1; i < myTab.rows.length; i++) {

    //     // GET THE CELLS COLLECTION OF THE CURRENT ROW.
    //     var objCells = myTab.rows.item(i).cells;

    //     // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
    //     for (var j = 1; j < objCells.length; j++) {

    //         textFile = textFile + objCells.item(j).innerHTML;
    //         //info.innerHTML = info.innerHTML + ' ' + objCells.item(j).innerHTML;
    //     }
    //     // ADD A BREAK (TAG).
    //     textFile = textFile + '\n';

    // }
    // nameFile = String(Date.now()) + '.txt';
    // download(nameFile, textFile);
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
<!--  Notifications Plugin    -->
<script src="resources/bootstrap-notify.js"></script>