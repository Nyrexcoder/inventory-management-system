<?php

include_once("constants.php");
include_once("DBOperation.php");
include_once("manage.php");

//-------------------------Order Processing--------------

if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("products");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm pid" required>
		            <option value="">Choose Product</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?><option value="<?php echo $row['id']; ?>"><?php echo $row["product_name"]; ?></option><?php
		            	}
		            ?>
		        </select>
		    </td>
            <td><input name="hsn[]" readonly type="text" class="form-control form-control-sm hsn"></td>   
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
		    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>

			<td><input name="amount[]" type="text" class="form-control form-control-sm amount" readonly></span>

			<td><input name="sgst[]" type="text" class="form-control form-control-sm sgst"></td>
			<td><input name="vsgst[]" type="text" class="form-control form-control-sm vsgst"readonly></td>

			<td><input name="cgst[]" type="text" class="form-control form-control-sm cgst" ></td>
			<td><input name="vcgst[]" type="text" class="form-control form-control-sm vcgst"readonly></td>

			<td><input name="igst[]" type="text" class="form-control form-control-sm igst" ></td>
			<td><input name="vigst[]" type="text" class="form-control form-control-sm vigst"readonly></td>

		    <td>Rs.<span class="amt">0</span></td>
		    <td><input name="pro_name[]" type="text" class="form-control form-control-sm pro_name"></s>
			
	</tr>
	<?php
	exit();
}


if (isset($_POST["order_date"]) AND isset($_POST["customer_name"])) {
	
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["customer_name"];
	$cust_gst = $_POST["customer_gst"];
	$cust_phone = $_POST["customer_phone"];
	$cust_address = $_POST["customer_address"];
	$cust_email = $_POST["customer_email"];


	//Now getting array from order_form
	$ar_hsn = $_POST["hsn"];
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_amount = $_POST["amount"];
	$ar_sgst = $_POST["sgst"];
	$ar_vsgst = $_POST["vsgst"];
	$ar_cgst = $_POST["cgst"];
	$ar_vcgst = $_POST["vcgst"];
	$ar_igst = $_POST["igst"];
	$ar_vigst = $_POST["vigst"];
	$ar_pro_name = $_POST["pro_name"];


	$t_amount = $_POST["tamount"];
	$discount = $_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];


	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$cust_gst,$cust_phone,$cust_address,$cust_email,$ar_hsn,$ar_tqty,$ar_qty,$ar_price,$ar_amount,$ar_sgst,$ar_vsgst,$ar_cgst,$ar_vcgst,$ar_igst,$ar_vigst ,$ar_pro_name,$discount,$t_amount,$paid,$due,$payment_type);

}

?>

<?php
$conn = new mysqli("localhost","root","","mybilling");

//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
	$pid = $_POST['id'];
	$result_array=[];
	$query = "SELECT * FROM products WHERE id='$pid' ";
	$query_run = mysqli_query($conn,$query);

	if(mysqli_num_rows($query_run) > 0)
	{
		foreach($query_run as $row)
		{
			array_push($result_array, $row);
		}
		header("content-type: application/json");
		echo json_encode($result_array);
	}
	exit();
}


?>
