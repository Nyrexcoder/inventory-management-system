<?php include "nav.php";   ?>
            <!-- content -->
            <h1 class="text-center">My Billing</h1>
            <hr />
            <h3>Add new</h3>

            <div class="container">
                <div class="jumbotron jumbotron-fluid">

        <div class="container">
        <h1 class="display-5">Add and Manage</h1>
            <div class="row my-3" >
                <!-- <div class="col-sm">
                <button class="btn btn-primary" data-toggle="modal" data-target="#category"><i class="bi bi-plus-lg"></i> CATEGORIES</button>
                </div> -->
                <div class="col-sm">
                <button class="btn btn-primary" data-toggle="modal" data-target="#hsn"><i class="bi bi-plus-lg"></i> HSN</button>
                <a href="mHsn.php"><button class="btn btn-success" data-toggle="modal" data-target="#hsn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Manage HSN"><i class="bi bi-kanban"></i> HSN</button></a>

            </div>
                <div class="col-sm">
                <button class="btn btn-primary" data-toggle="modal" data-target="#product"><i class="bi bi-plus-lg"></i> PRODUCT</button>
                <a href="mProduct.php"><button class="btn btn-success" data-toggle="modal" data-target="#product" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Manage Products"><i class="bi bi-kanban"></i> PRODUCT</button></a>

            </div>
            </div>
            </div>

                </div>
            </div>





        </div>
    </div>
</div>

<?php
  // Category 
  include_once("./category.php");
  // Brand
  include_once("./hsn.php");
  // Product 
  include_once("./product.php");

?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script></body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
  </script>

  </body>
</html>