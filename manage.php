<?php

/**
* 
*/
class Manage
{
	
	private $con;

	function __construct()
	{
		include_once("db.php");
		$db = new Database();
		$this->con = $db->connect();
	}



		public function getSingleRecord($table,$pk,$id)
		{
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table." WHERE ".$pk."= ?");
		$pre_stmt->bind_param('si',$table, $id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		}
		return $row;
	}



	public function storeCustomerOrderInvoice($orderdate,$cust_name,$cust_gst,$cust_phone,$cust_address,$cust_email,$ar_hsn,$ar_tqty,$ar_qty,$ar_price,$ar_amount,$ar_sgst,$ar_vsgst,$ar_cgst,$ar_vcgst,$ar_igst,$ar_vigst ,$ar_pro_name,$discount,$t_amount,$paid,$due,$payment_type){
		$pre_stmt = $this->con->prepare("INSERT INTO `invoice`(`order_date`,`customer_name`, `gst_no`, `phone`, `address`, `email`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$pre_stmt->bind_param("ssssssdddds",$orderdate,$cust_name,$cust_gst,$cust_phone,$cust_address,$cust_email,$discount,$t_amount,$paid,$due,$payment_type);
		$pre_stmt->execute() or die($this->con->error);
		$invoice_no = $pre_stmt->insert_id;
		if ($invoice_no != null) {
			for ($i=0; $i < count($ar_price) ; $i++) {


				//Here we are finding the remaing quantity after giving customer
				 $rem_qty = $ar_tqty[$i] - $ar_qty[$i];

				if ($rem_qty < 0) {
					return "ORDER_FAIL_TO_COMPLETE";
				}else{
					//Update Product stock
					$sql = "UPDATE products SET product_qty = '$rem_qty' WHERE product_name = '".$ar_pro_name[$i]."'";
					$this->con->query($sql);
				}


				$insert_product = $this->con->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `hsn`, `price`, `sgst`, `v_sgst`, `cgst`, `v_cgst`, `igst`, `v_igst`, `qty`, `amount`) 
				 VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
				$insert_product->bind_param("isididididid",$invoice_no,$ar_pro_name[$i],$ar_hsn[$i],$ar_price[$i],$ar_sgst[$i],$ar_vsgst[$i],$ar_cgst[$i],$ar_vcgst[$i],$ar_igst[$i],$ar_vigst[$i],$ar_qty[$i],$ar_amount[$i]);
				$insert_product->execute() or die($this->con->error);
			}

			return $invoice_no ;
			// return $invoice_no;
		}



	}


}

?>