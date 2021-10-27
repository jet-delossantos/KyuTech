<footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                  <li><a href="#" target="_blank" style="font-size:60%" color="inherit">Licenses</a></li>
                </ul>
              </nav>
              <div class="credits ml-auto">
                <span class="copyright" style="font-size:80%">
                  © 2021, Kyutech
                </span>
              </div>
            </div>
          </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
              function showTableData() {
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
                  nameFile = String(Date.now()) + '.txt';
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

              $(function () {
                  $('#datepicker').datepicker();
              });

              $(function () {
                  $('#datepicker1').datepicker();
              });
</script>
<script>
    function showToast(from, align, mode, text){
      color = mode;

      $.notify({
          icon: "nc-icon nc-bell-55",
          message: text
        },{
            type: color,
            timer: 5000,
            placement: {
                from: from,
                align: align
            }
        });
      }
  </script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
</body>


</html>