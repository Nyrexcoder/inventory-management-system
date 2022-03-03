<?php
include 'conn.php';
if(isset($_POST['submit'])){
    if(!empty($_POST['hsn'])){
        $hsn=$_POST['hsn'];

        $query = "insert into hsn_number(hsn) values ('$hsn')";
        $run = mysqli_query($conn,$query)or die(mysqli_error());

        if($run){
          echo "hsn inserted";
        }
        else{
            echo "hsn not inserted";
        }
    }
    else{
        // echo "all fields requires";
    }
}





?>





<!-- Modal -->
<div class="modal fade" id="hsn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD HSN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- content  -->
         <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Add HSN Number</label>
            <input required type="number" name="hsn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="container text-center">
        <button name="submit" type="submit" class="btn btn-primary">Save</button>
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