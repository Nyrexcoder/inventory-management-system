<?php
include 'conn.php';
if(isset($_POST['submit2'])){
    if(!empty($_POST['hsn']) && !empty($_POST['pDes']) && !empty($_POST['pName']) && !empty($_POST['pPrice']) && !empty($_POST['units']) && !empty($_POST['pQty'])){
        $description = $_POST['pDes'];
        $hsn = $_POST['hsn'];
        $name = $_POST['pName'];
        $price = $_POST['pPrice'];
        $units = $_POST['units'];
        $qty = $_POST['pQty'];

        $query = "insert into products(product_description, product_hsn, product_name, product_price, units, product_qty) 
        values ('$description','$hsn','$name','$price','$units','$qty')";
        $run = mysqli_query($conn,$query)or die(mysqli_error());

        if($run){
            echo "product inserted";
        }
        else{
            echo "product not inserted";
        }
    }
    else{
        // echo "all fields requires";
    }
}



?>





<!-- Modal -->
<div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD PRODUCT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- content  -->
         <form class="row g-3" method="post">
         <div class="col-md-6">
          <?php

            include 'conn.php';
            $query = "SELECT * FROM hsn_number WHERE id";
            $result = mysqli_query($conn , $query);
            echo "<label for='exampleInputEmail1'>Product HSN</label>";
            echo "<select name='hsn' class='form-select' aria-label='Default select example'>";
            echo "<option selected>None</option>";
                while($row=mysqli_fetch_assoc($result)){
                  echo "<option>".$row["hsn"]."</option>";
                }
            echo "</select>";

          ?>
        </div>


        <div class="col-md-6">
            <label for="exampleInputEmail1">Product Name</label>
            <input name="pName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" Required>
        </div>

        <div class="col-md-6">
        <label for="exampleInputEmail1">Product Description</label>
            <textarea name="pDes" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" Required></textarea>
        </div>

        <div class="col-md-6">
            <label for="exampleInputEmail1">Product Price</label>
            <input name="pPrice" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" Required>
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1">Units</label>
            <select name="units" class="form-select" aria-label="Default select example">
                <option selected>None</option>
                <option value="KG">KG</option>
                <option value="PKT">PKT</option>
                <option value="PIC">PIC</option>
          </select>
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1">Product QTY.</label>
            <input name="pQty" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" Required>
        </div>
        <div class="container text-center">
        <button name="submit2" type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        </div>
        </form>
        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>