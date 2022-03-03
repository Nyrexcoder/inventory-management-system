<?php include "nav.php";  ?>
            <!-- content -->
            <h1 class="text-center">My Billing</h1>
            <hr />
            <h3>INVOICE RECORDS</h3>



                    <div class="container">
                    <table class="table my-5" id="mytabale">
                        <input type="text" id="myInput" placeholder="Search...." class="form-control"> 
                    <thead>
                        <tr class="table-info">
                        <th scope="col">Date</th>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Gst No.</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Address</th>
                        <!-- <th scope="col">Email</th> -->
                        <th scope="col">Total Amount</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                        <!-- <th scope="col">Discount</th> -->
                        <!-- <th scope="col">Payment Method</th> -->
                        <th scope="col">More</th>
                        <th scope="col">Print</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <?php 
                    include 'conn.php';
                    $query = "SELECT * FROM invoice Inner Join invoice_details ON invoice.invoice_no = invoice_details.invoice_no";
                    $result = mysqli_query($conn , $query);
                    $sno=0;
                    while($res = mysqli_fetch_array($result)){
                    ?>
                    <tbody>
                        <tr>
                        <td><?php echo $res['order_date'] ?></td>
                        <td><?php echo $res['invoice_no'] ?></td>
                        <td><?php echo $res['customer_name'] ?></td>
                        <td><?php echo $res['gst_no'] ?></td>
                        <td><?php echo $res['phone'] ?></td>
                        <td><?php echo $res['address'] ?></td>
                        
                        <td><?php echo (round ($res['net_total'])); ?></td>
                        <td><?php echo $res['paid'] ?></td>
                        <td><?php echo (round ($res['due']));?></td>
                       
                        
                        <td><a href="more_data.php?record_id=<?php echo  $res['invoice_no']; ?>"><button type="button" class="btn btn-warning"><i class="bi bi-filter"></i></button></a></td>
                        <td><a href="print_recodes.php?invoice_id=<?php echo  $res['invoice_no']; ?>"><button type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i></button></a></td>
                        <td><a href="edit_invoice.php?invoice_id=<?php echo  $res['invoice_no']; ?>"><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a></td>
                        <td><a href="delete.php?invoice_id=<?php echo  $res['invoice_no']; ?>"><button type="button" class="btn btn-danger delete"><i class="bi bi-trash"></i></button></a></td>
                       
                      </tr>
                    </tbody>
                    <?php      
                    } ?>
                    </table>
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



<script>
    $(document).ready( function () {
    $('#myInput').on("keyup",function(){
    var value = $(this).val().toLowerCase();
    $("#mytabale tr").filter(function(){
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
    });



} );


</script>

</body>
</html>