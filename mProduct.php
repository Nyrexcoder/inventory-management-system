<?php   include "nav.php";      ?>
<!--Category Modal -->


<!-- Modal -->
<div class="modal fade" id="edit_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE PRODUCT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <!-- content  -->
         <form class="row g-3" action="edit.php" method="post">
        
        <div class="col-md-6">
            <input required type="hidden" name="pid" class="form-control" id="pid" aria-describedby="emailHelp">
            <label for="exampleInputEmail1">Product hsn</label>
            <input type="text" name="product_Hsn" class="form-control" id="product_hsn" aria-describedby="emailHelp" Required>
        </div>


        <div class="col-md-6">
            <label for="exampleInputEmail1">Product Name</label>
            <input name="pName" type="text" class="form-control" id="product_name" aria-describedby="emailHelp" Required>
        </div>

        <div class="col-md-6">
        <label for="exampleInputEmail1">Product Description</label>
            <textarea name="pDes" type="text" class="form-control" id="product_description" aria-describedby="emailHelp" Required></textarea>
        </div>

        <div class="col-md-6">
            <label for="exampleInputEmail1">Product Price</label>
            <input name="pPrice" type="number" class="form-control" id="product_price" aria-describedby="emailHelp" Required>
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1">Units</label>
            <select name="units" class="form-select" id="product_unit" aria-label="Default select example">
                <option selected>None</option>
                <option value="KG">KG</option>
                <option value="PKT">PKT</option>
                <option value="PIC">PIC</option>
          </select>
        </div>
        <div class="col-md-6">
            <label for="exampleInputEmail1">Product QTY.</label>
            <input name="pQty" type="number" class="form-control" id="product_qty" aria-describedby="emailHelp" Required>
        </div>
        <div class="container text-center">
        <button name="update_product" type="submit" class="btn btn-primary ">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        </div>
        </form>
        <!-- end -->
      </div>
    </div>
  </div>
</div>











            <!-- content -->
            <h1 class="text-center">My Billing</h1>
            <hr />
            <h3>Manage Products</h3>


    <div class="container">
  <table class="table my-5" id="mytabale">
    <input type="text" id="myInput" placeholder="Search...." class="form-control"> 
  <thead>
    <tr class="table-info">
      <th scope="col">S.no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Hsn</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Unit</th>
      <th scope="col">Product Qty.</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

  <?php 
  include 'conn.php';
  $query = "SELECT * FROM products";
  $result = mysqli_query($conn , $query);
  $sno=0;
  while($res = mysqli_fetch_array($result)){
    $sno=$sno+ 1;
  ?>
  <tbody>
    <tr>
      <td class="d-none product_id"><?php echo $res['id'] ?></td>
      <td><?php echo $sno ?></td>
      <td><?php echo $res['product_name'] ?></td>
      <td><?php echo $res['product_hsn'] ?></td>
      <td><?php echo $res['product_description'] ?></td>
      <td><?php echo $res['product_price'] ?></td>
      <td><?php echo $res['units'] ?></td>
      <td><?php echo $res['product_qty'] ?></td>
      <td><button type="button" class="btn btn-primary edit_btn" data-bs-toggle="modal" data-bs-target="#edit_product"><i class="bi bi-pencil-square"></i></button></td>
      <td><a href="delete.php?id=<?php echo $res['id'] ?>"><i class="bi bi-trash btn btn-danger"></i></a></td>
    </tr>
  </tbody>
  <?php      
  } ?>
</table>
  </div>





        </div>
    </div>
</div>





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



<!-- edit modal  -->
<script>
$(document).ready(function() {
  $('.edit_btn').click(function (e) {
    e.preventDefault();
    var product_id = $(this).closest('tr').find('.product_id').text();
    console.log(product_id);

    $.ajax({
      type: "POST",
      url : "edit.php",
      data : {
        'checking_edit_btn3':true,
        'product_id':product_id,
      },
      success : function (response){
        console.log(response);
        $.each(response, function (key, value){
          // console.log(value['category']);
          $('#pid').val(value['id']);
          $('#product_hsn').val(value['product_hsn']);
          $('#product_description').val(value['product_description']);
          $('#product_name').val(value['product_name']);
          $('#product_price').val(value['product_price']);
          $('#product_unit').val(value['units']);
          $('#product_qty').val(value['product_qty']);
        });
        $('#edit_product').modal('show');
        
      }
    });
  
  
  });
});


</script>







  </body>
</html>