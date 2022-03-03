<?php include "cheack_internet.php";  ?>

<?php
include_once("constants.php");
?>

<?php
// session_start();

if(isset($_SESSION['user']))
{
  // echo "We Come". $_SESSION['user']."<br/>";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <i class="bi-bootstrap fs-1"></i>
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                            <i class="bi-house fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="newInvoice.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Make Invoice">
                            <i class="bi bi-filter-square fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="add.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Add New Item">
                            <i class="bi bi-plus-lg fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="records.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Invoice Records">
                            <i class="bi-table fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="income_statement.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Income_Statement">
                            <i class="bi-people fs-1"></i>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle h2"></i>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">

                                <?php


                                    echo "<li><a class='dropdown-item' href='logout.php?logout'>Logout</a></li>";
                                    }
                                    else{
                                    header("location:index.php");
                                    }



                                ?>


                        <!-- <li><a class="dropdown-item" href="index.php">Logout</a></li> -->
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">