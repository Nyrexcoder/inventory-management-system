<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</head>


<body>
    
<div class="container my-5 box_body" style="width:900px;">
    <div class="container" style="background-color:#33ccff; width:800px; margin-top:80px; border:2px solid black; border-radius:10px; padding: 50px 50px">
    

    <?php
        if(@$_GET['Empty']==true)
        {
          ?>
          <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty']; ?></div>
          <?php
        }


?>


<?php
        if(@$_GET['Invalid']==true)
        {
          ?>
          <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid']; ?></div>
          <?php
        }


?>


    <h1 align="center"><i class="bi bi-person"></i> User Login Here</h1>
    <form class="my-3" action="login_process.php" method="POST">
  <div class="form-group mx-auto"style="width: 400px;">
    <label for="exampleInputEmail1"><i class="bi bi-lock-fill"></i>User ID</label>
    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" style="border-radius:12px;">
  </div>
  <div class="form-group my-5 mx-auto" style="width:400px;">
    <label for="exampleInputPassword1"><i class="bi bi-key-fill"></i> Password</label>
    <input type="password" name="password" class="form-control" style="border-radius:12px;">
  </div>

  <div class="container text-center"><button class="btn btn-primary" style="background:purple" name="login">Login</button></div>
</form>
</div>
</div>
</body>
</html>