<?php 
include "conn.php";
include "nav.php";
 ?>
<?php
// Invoice date 
$id = $_GET['record_id'];
$sql = "SELECT *  FROM invoice WHERE invoice_no=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$invoice_no = $row['invoice_no'];
$date = $row['order_date'];
$customer_name = $row['customer_name'];
$address = $row['address'];
$phone = $row['phone'];
$email = $row['email'];
$discount = $row['discount'];
$net_total = $row['net_total'];
$paid = $row['paid'];
$due = $row['due'];
$payment_type = $row['payment_type'];
$gst_no = $row['gst_no'];

?>

 <!-- content -->
 <h1 class="text-center">My Billing</h1>
            <hr />
            <h3>CUSTOMER RECORDS</h3>



                    <div class="container">
                        <a href="export_excel.php?xls_id=<?php echo $id; ?>"><button class="btn btn-success">Export in Excel</button></a>
                    <table class="table my-5" id="mytabale">
                    <thead>
                        <tr class="table-warning">
                        <th scope="col">Date</th>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Gst No.</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                        <th scope="col">Payment Method</th>
                       
                        </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th><?php echo $date;   ?></th>
                        <th><?php echo $invoice_no;   ?></th>
                        <th><?php echo $customer_name;   ?></th>
                        <th><?php echo $gst_no;   ?></th>
                        <th><?php echo $phone;   ?></th>
                        <th><?php echo $address;   ?></th>
                        <th><?php echo $email;   ?></th>
                        <th><?php echo (round ($net_total));   ?></th>
                        <th><?php echo $discount;   ?></th>
                        <th><?php echo $paid;   ?></th>
                        <th><?php echo (round ($due));   ?></th>
                        <th><?php echo $payment_type;   ?></th>
                        
                    </tr>

                    </tbody>

                    <thead>
                        <tr class="table-danger">
                        <th scope="col">product Name</th>
                        <th scope="col">hsn</th>
                        <th scope="col">price</th>
                        <th scope="col">Qty.</th>
                        <th scope="col">Amount</th>
                        <th scope="col">sgst</th>
                        <th scope="col">value</th>
                        <th scope="col">cgst</th>
                        <th scope="col">value</th>
                        <th scope="col">igst</th>
                        <th scope="col">value</th>
                        <th scope="col">Total Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php
                                include('database_connection.php');

    

                                $statement = $connect->prepare(
                                    "SELECT * FROM invoice_details 
                                    WHERE invoice_no = :invoice_no"
                                   );
                                   $statement->execute(
                                    array(
                                     ':invoice_no'       =>  $_GET['record_id']
                                    )
                                   );
                                   $item_result = $statement->fetchAll();
                                   $count = 0;
                                   foreach($item_result as $sub_row)
                                   {
                                    $count++;

                            ?>
                    <tr>
                        <th><?php echo $sub_row['product_name'];   ?></th>
                        <th><?php echo $sub_row['hsn'];   ?></th>
                        <th><?php echo $sub_row['price'];   ?></th>
                        <th><?php echo $sub_row['qty']   ?></th>
                        <th><?php echo $sub_row['amount']   ?></th>
                        <th><?php echo $sub_row['sgst']. "%";   ?></th>
                        <th><?php echo $sub_row['v_sgst'];   ?></th>
                        <th><?php echo $sub_row['cgst']. "%";   ?></th>
                        <th><?php echo $sub_row['v_cgst'];   ?></th>
                        <th><?php echo $sub_row['igst']. "%";   ?></th>
                        <th><?php echo $sub_row['v_igst'];   ?></th>
                        <th><?php echo $sub_row['amount'] +$sub_row['v_sgst'] + $sub_row['v_cgst'] + $sub_row['v_igst'];   ?></th>
                    </tr>

                    <?php }  ?>

                    </tbody>



                </table>




<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
})
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    


  </body>
</html>