
<?php 

include 'conn.php';
extract($_GET);
$query = "DELETE FROM hsn_number WHERE id='$id'";
mysqli_query($conn, $query);
header('location:mHsn.php');

// Delete invoice data 
$invoice_id = $_GET['invoice_id'];
if(isset($invoice_id)){
    $query2 = "DELETE FROM invoice and invoice_details WHERE invoice_no='$invoice_id'";
    mysqli_query($conn, $query2);
    header('location:records.php');
}


?>