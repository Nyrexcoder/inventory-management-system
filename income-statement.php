<?php
include "nav.php";


?>
<style>
    .box{
        height: 150px;
        width:200px;
        border:2px solid black;
        border-radius:10px;
    }
</style>

<div class="container" style="margin-top:50px">
  <div class="row">
    <div class="col">
      <div class="container box" style="background:#17F589;">
            <h3>Paid Amount</h3>
            <?php
                include "conn.php";
                ?>
                <?php
                //sql query
                $sql = "SELECT SUM(paid) from invoice";
                $result = $conn->query($sql);
                //display data on web page
                while($row = mysqli_fetch_array($result)){
                    $row['SUM(paid)'];
                
                ?>
                <h4 class="mt-3 text-center"><?php echo $row['SUM(paid)']; ?></h4>

                <?php } ?>
      </div>
    </div>
    <div class="col">
            <div class="container box" style="background:#F51761;">
            <h3>Due Amount</h3>

                    <?php
                    //sql query
                    $sql = "SELECT SUM(due) from invoice";
                    $result = $conn->query($sql);
                    //display data on web page
                    while($row = mysqli_fetch_array($result)){
                        $row['SUM(due)'];
                       ?>

            <h4 class="mt-3 text-center"><?php echo (round ($row['SUM(due)'])); ?></h4>

            <?php } ?>

      </div>
    </div>
    <div class="col">
    <div class="container box" style="background:#17B8F5;">
    <h3 class="text-center">Statement</h3>

    <?php

if((isset($row['SUM(paid)'])) > (isset($row['SUM(due)'])))
{
 ?>   

    
    <h4 class="mt-3 text-center"><?php echo "Profit"; ?></h4>

    <?php }else { ?>
        <h4 class="mt-3 text-center"><?php echo "Loss"; ?></h4>
        <?php } ?>
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

</body>
</html>

<?php  $conn->close(); ?>