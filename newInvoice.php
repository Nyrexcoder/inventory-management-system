<?php include "nav.php"; ?>
            <!-- content -->
            <h1 class="text-center">My Billing</h1>
            <hr />
            <h3>CREATE INVOICE</h3>



<div class="overlay"><div class="loader"></div></div>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>New INVOICE</h4>
				  </div>
				  <div class="card-body">
				  	<form id="get_order_data" onsubmit="return false">
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Today Date</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
				  			</div>
				  		</div>
				  		<!-- <div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="cust_name" name="cust_name"class="form-control form-control-sm" placeholder="Enter Customer Name" />
				  			</div>
				  		</div> -->

						  <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
				  				<h3>Customer Details</h3>
								  <table align="center" style="width:800px">
								  <thead>
								  <tr>
		                                <th style="text-align:center;">Customer Name</th>
                                        <th style="text-align:center;">Gst No.</th>
		                                <th style="text-align:center;">Phone</th>
		                                <th style="text-align:center;">Address</th>
		                                <th style="text-align:center;">Email</th>
		                              </tr>
								  </thead>
								  <tbody>
									  <td><input type="text" name="customer_name" class="form-control form-control-sm" id="cust_name"></td>
									  <td><input type="text" name="customer_gst" class="form-control form-control-sm"></td>
									  <td><input type="text" name="customer_phone" class="form-control form-control-sm"></td>
									  <td><input type="text" name="customer_address" class="form-control form-control-sm"></td>
									  <td><input type="email" name="customer_email" class="form-control form-control-sm"></td>
								  </tbody>

								  </table>
								</div>
							</div>

				  		<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
				  				<h3>Make a Item list</h3>
				  				<table align="center" style="width:800px;">
		                            <thead>
		                              <tr>
		                                <th>S.No.</th>
		                                <th style="text-align:center;">Item Name</th>
                                        <th style="text-align:center;">HSN No.</th>
		                                <th style="text-align:center;">Total Quantity</th>
		                                <th style="text-align:center;">Quantity</th>
										<th style="text-align:center;">Price</th>
		                                <th style="text-align:center;">Amount</th>
										<th style="text-align:center;">SGST</th>
										<th style="text-align:center;">SGST Value</th>
										<th style="text-align:center;">CGST</th>
										<th style="text-align:center;">CGST Value</th>
										<th style="text-align:center;">IGST</th>
										<th style="text-align:center;">IGST Value</th>
		                                <th>Total</th>
		                              </tr>
		                            </thead>
		                            <tbody id="invoice_item">

		<!--<tr>
		    <td><b id="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm" required>
		            <option>Washing Machine</option>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
		    <td>Rs.1540</td>
		</tr>-->
		                            </tbody>
		                        </table> <!--Table Ends-->
		                        <center style="padding:10px;">
		                        	<button id="add" style="width:150px;" class="btn btn-success">Add</button>
		                        	<button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
		                        </center>
				  			</div> <!--Crad Body Ends-->
				  		</div> <!-- Order List Crad Ends-->

				  	<p></p>
                    <!-- <div class="form-group row">
                      <label for="sub_total" class="col-sm-3 col-form-label" align="right">pid</label>
                      <div class="col-sm-6">
                        <input name="pid[]" id="pidv" type="text" class="form-control form-control-sm pid" />
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <!-- <label for="Tamount" class="col-sm-3 col-form-label" align="right">Total Amount</label> -->
                      <div class="col-sm-6">
                        <input type="hidden" readonly name="tamount" class="form-control form-control-sm" id="tamount" />
                      </div>
                    </div>
					<div class="form-group row">
					  <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
					  <div class="col-sm-6">
						<input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" />
					  </div>
					</div>
                    <div class="form-group row">
                      <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                      <div class="col-sm-6">
                        <input type="text" name="discount" class="form-control form-control-sm" id="discount" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                      <div class="col-sm-6">
                        <input type="text" name="paid" class="form-control form-control-sm" id="paid" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                      <div class="col-sm-6">
                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method</label>
                      <div class="col-sm-6">
                        <select name="payment_type" class="form-control form-control-sm" id="payment_type" />
                          <option>Cash</option>
                          <option>Card</option>
                          <option>Draft</option>
                          <option>Cheque</option>
                        </select>
                      </div>
                    </div>

                    <center>
                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Save">
                      <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                    </center>


				  	</form>

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

<script>
    $(document).ready(function(){

// alert("hel.lo");
	addNewRow();

	$("#add").click(function(){
		addNewRow();
	})

	function addNewRow(){
		
		$.ajax({
			url : "process.php",
			method : "POST",
			data : {getNewOrderItem:1},
			success : function(data){
				$("#invoice_item").append(data);
				var n=0;
				$(".number").each(function(){
					$(this).html(++n);
				})
			}
		})
	}

	// $("#remove").click(function(){
	// 	$("#invoice_item").children("tr:last").remove();
	// 	// calculate(0,0);

    $("#remove").click(function(){
        $("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	});


    $("#invoice_item").delegate(".pid","change",function(){
		var pid = $(this).val();
		var tr = $(this).parent().parent();
		$(".overlay").show();
		$.ajax({
			url : "process.php",
			method : "POST",
			dataType : "json",
			data : {getPriceAndQty:1,id:pid},
			success : function(data){
                // alert(data);
				$.each(data,function(key, pview){
					console.log(pview['product_qty']);
				tr.find(".hsn").val(pview["product_hsn"]);
				tr.find(".tqty").val(pview["product_qty"]);
				// tr.find(".pro_cat").val(pview["product_category"]);
				tr.find(".pro_name").val(pview["product_name"]);
				tr.find(".qty").val(0);
				tr.find(".sgst").val(0);
				tr.find(".cgst").val(0);
				tr.find(".igst").val(0);
				tr.find(".price").val(pview["product_price"]);
				tr.find(".amount").val(tr.find(".price").val() * tr.find(".qty").val() );
				tr.find(".vsgst").val((tr.find(".sgst").val() / 100) * tr.find(".amount").val() );
				tr.find(".vcgst").val((tr.find(".cgst").val() / 100) * tr.find(".amount").val() );
				tr.find(".vigst").val((tr.find(".igst").val() / 100) * tr.find(".amount").val() );
				calculate(0,0);
			});
				
			}
		})
	})
	
	// Calculate tables function
	$("#invoice_item").delegate(".qty","keyup",function(){
		var qty = $(this);
		var tr = $(this).parent().parent();
		if(isNaN(qty.val())){
			alert("Please Enter a Valid Quantity");
			qty.val(1);
		}else{
			if ((qty.val() - 0) > (tr.find(".tqty").val()-0)) {
				alert("Sorry ! This much of quantity is not available");
				aty.val(1);
				
			}else{
				tr.find(".amount").val(tr.find(".price").val() * tr.find(".qty").val() );
				calculate(0,0);
			}
		}
			
	});


	// calculate sgst taxable value 
	$("#invoice_item").delegate(".sgst","keyup",function(){
		var sgst = $(this);
		var tr = $(this).parent().parent();
		tr.find(".vsgst").val((tr.find(".sgst").val() / 100) * tr.find(".amount").val() );
		tr.find(".amt").html(parseFloat(tr.find(".amount").val()) + parseFloat(tr.find(".vsgst").val()) + parseFloat(tr.find(".vcgst").val()) );
		calculate(0,0);
			
	});

		// calculate cgst taxable value 
		$("#invoice_item").delegate(".cgst","keyup",function(){
		var cgst = $(this);
		var tr = $(this).parent().parent();
		tr.find(".vcgst").val((tr.find(".cgst").val() / 100) * tr.find(".amount").val() );
		tr.find(".amt").html(parseFloat(tr.find(".amount").val()) + parseFloat(tr.find(".vsgst").val()) + parseFloat(tr.find(".vcgst").val()) );
		calculate(0,0);
			
	});

		// calculate igst taxable value 
		$("#invoice_item").delegate(".igst","keyup",function(){
		var igst = $(this);
		var tr = $(this).parent().parent();
		tr.find(".vigst").val((tr.find(".igst").val() / 100) * tr.find(".amount").val() );
		tr.find(".amt").html(parseFloat(tr.find(".amount").val()) + parseFloat(tr.find(".vigst").val()) );
		calculate(0,0);
			
	});




	function calculate(dis,paid){
		var net_total = 0;
		var discount = dis;
		var paid_amt = paid;
		var due = 0;
		$(".amt").each(function(){
			net_total = net_total + ($(this).html() * 1);
		})
		$("#tamount").val(net_total);
		net_total = net_total - discount;
		due = net_total - paid_amt;		
		$("#discount").val(discount);
		$("#net_total").val(net_total);
		//$("#paid")
		$("#due").val(due);
		

	}

	$("#discount").keyup(function(){
		var discount = $(this).val();
		calculate(discount,0);
	})

	$("#paid").keyup(function(){
		var paid = $(this).val();
		var discount = $("#discount").val();
		calculate(discount,paid);
	})


	/*Order Accepting*/
	$("#order_form").click(function(){
		var invoice = $("#get_order_data").serialize();
		if ($("#cust_name").val() === "") {
			alert("Plaese enter customer name");
		}else if($("#paid").val() === ""){
			alert("Plaese eneter paid amount");
		}else{
		$.ajax({
			url :"process.php",
			method : "POST",
			data : $("#get_order_data").serialize(),
			success : function(data){
				// alert(data);
			
				if (data < 0) {
						alert(data);
					}else{
						$("#get_order_data").trigger("reset");

						if (confirm("Do u want to print invoice ?")) {
							window.location.href = "pdf.php?invoice_no="+data+"&"+invoice;
						}
						
					}

			
			}
		})
	}

});
	

	});
    </script>


</body>
</html>