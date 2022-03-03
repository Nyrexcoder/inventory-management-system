<?php
include('database_connection.php');
$statement = $connect->prepare(
    "SELECT * FROM invoice_details 
    WHERE invoice_no = :invoice_no"
   );
   $statement->execute(
    array(
     ':invoice_no'       =>  $_GET['xls_id']
    )
   );
   $item_result = $statement->fetchAll();
   $count = 0;
   foreach($item_result as $sub_row)
   {
    $count++;
    $product_name = $sub_row['product_name'];
    $hsn = $sub_row['hsn'];
    $price = $sub_row['price'];
    $qty = $sub_row['qty'];
    $amount = $sub_row['amount'];
    $sgst = $sub_row['sgst'];
    $vsgst = $sub_row['v_sgst'];
    $cgst = $sub_row['cgst'];
    $vcgst = $sub_row['v_cgst'];
    $igst = $sub_row['igst'];
    $vigst = $sub_row['v_igst'];
    $total = $amount + $vsgst + $vcgst + $vigst;
   }

require('conn.php');
$xls_id = $_GET['xls_id'];
$sql = "SELECT * from invoice where invoice_no = $xls_id";
$res = mysqli_query($conn, $sql);
$html = '<table><tr><td>Date</td><td>Invoice No.<td>Customer Name</td><td>GST NO.</td><td>Phone No.</td><td>Address</td><td>Email</td><td>Total Amount</td><td>Discount</td><td>Paid</td><td>Due</td><td>Payment Method</td><td>Product Name</td><td>Hsn<td>Price</td><td>Qty.</td><td>Amount</td><td>sgst</td><td>value</td><td>cgst</td><td>value</td><td>igst</td><td>value</td><td>Total</td></tr>';
while($row=mysqli_fetch_assoc($res)){
    $date = $row['order_date'];
    $invoice = $row['invoice_no'];
    $customer =$row['customer_name'];
    $gst = $row['gst_no'];
    $phone = $row['phone'];
    $address= $row['address'];
    $email = $row['email'];
    $total = $row['net_total'];
    $discount = $row['discount'];
    $paid = $row['paid'];
    $due = $row['due'];
    $payment = $row['payment_type'];
}
$html.='<tr><td>'.$date.'</td><td>'.$invoice.'<td>'.$customer.'</td><td>'.$gst.'</td><td>'.$phone.'</td><td>'.$address.'</td><td>'.$email.'</td><td>'.$total.'</td><td>'.$discount.'</td><td>'.$paid.'</td><td>'.$due.'</td><td>'.$payment.'</td><td>'.$product_name.'</td><td>'.$hsn.'</td><td>'.$price.'</td><td>'.$qty.'</td><td>'.$amount.'</td><td>'.$sgst.'</td><td>'.$vsgst.'</td><td>'.$cgst.'</td><td>'.$vcgst.'</td><td>'.$igst.'</td><td>'.$vigst.'</td><td>'.$total.'</td></tr>';

$html.='</table>';
header('Content-Type:applicaton/xls');
header('Content-Disposition:attachment;filename=Customer Report.xls');
echo $html;

?>