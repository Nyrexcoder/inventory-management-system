<?php  include "nav.php";  ?>
<!--Category Modal -->


<!-- Modal -->
<div class="modal fade" id="editHsn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Hsn</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <!-- content  -->
         <form action="edit.php" method="post">
        <div class="form-group">
        <input required type="hidden" name="id" class="form-control" id="id" aria-describedby="emailHelp">
            <label for="exampleInputEmail1">Edit Hsn</label>
            <input required type="text" name="hsn" class="form-control" id="hsn" aria-describedby="emailHelp">
        </div>
        <div class="container text-center mt-3">
        <button name="update_hsn" type="submit" class="btn btn-primary">update</button>
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
            <h3>Manage HSN</h3>


    <div class="container">
  <table class="table my-5" id="mytabale">
    <input type="text" id="myInput" placeholder="Search...." class="form-control"> 
  <thead>
    <tr class="table-info">
      <th scope="col">S.no</th>
      <th scope="col">HSN</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

  <?php 
  include 'conn.php';
  $query = "SELECT * FROM hsn_number";
  $result = mysqli_query($conn , $query);
  $sno=0;
  while($res = mysqli_fetch_array($result)){
    $sno=$sno+ 1;
  ?>
  <tbody>
    <tr>
      <td class="d-none hsn_id"><?php echo $res['id'] ?></td>
      <td><?php echo $sno ?></td>
      <td><?php echo $res['hsn'] ?></td>
      <td><button type="button" class="btn btn-primary edit_btn" data-bs-toggle="modal" data-bs-target="#editHsn"><i class="bi bi-pencil-square"></i></button></td>
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
    var hsn_id = $(this).closest('tr').find('.hsn_id').text();
    // console.log(hsn_id);

    $.ajax({
      type: "POST",
      url : "edit.php",
      data : {
        'checking_edit_btn2':true,
        'hsn_id':hsn_id,
      },
      success : function (response){
        // console.log(response);
        $.each(response, function (key, value){
          // console.log(value['category']);
          $('#id').val(value['id']);
          $('#hsn').val(value['hsn']);
        });
        $('#editHsn').modal('show');
        
      }
    });
  
  
  });
});


</script>





  </body>
</html>