<?php include "nav.php";  ?>
            <!-- content -->
            <h1 class="text-center">My Billing</h1>
            <hr />
            <h3>DASHBOARD</h3>
            
            <div class="container">
            <div class="row">
            <div class="col">
            <!-- CONTAINT -->
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div id="piechart" style="width:700px; height:70vh; "></div>
                    </div>
                    <div class="col">
                        <h1 class="my-4">WELCOME</h1>
                        <div class="jumbotron">
                        <!-- content  -->
                        <div class="container">
                        <iframe src="https://free.timeanddate.com/clock/i84h4khq/n3791/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>
                        </div>
                        </div>
                    </div>
  </div>

        </div>
    </div>
        </div>
    </div>
</div>

    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  	  return new bootstrap.Tooltip(tooltipTriggerEl)
})
  </script>

<?php
include "conn.php";
?>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Products', 'Avilable Quantity'],
        
          <?php

            $sql = "SELECT * FROM products";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)){
               echo"['".$result['product_name']."',".$result['product_qty']."],";
            }

        ?>

         
        ]);

        var options = {
          title: 'Stock Report'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


  </body>
</html>