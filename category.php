<?php include "cheack_internet.php";  ?>

<?php
include 'conn.php';
if(isset($_POST['submit'])){
    if(!empty($_POST['category'])){
        $category=$_POST['category'];

        $query = "insert into categories(category) values ('$category')";
        $run = mysqli_query($conn,$query)or die(mysqli_error());

        if($run){
            echo "Category inserted";
        }
        else{
            echo "Category not inserted";
        }
    }
    else{
        // echo "all fields requires";
    }
}


?>


<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CATEGORIES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- content  -->
                <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Add Category</label>
            <input required type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="container text-center">
        <button name="submit" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Success">Save</button>
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