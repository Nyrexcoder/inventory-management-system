<?php include "cheack_internet.php";  ?>
<?php
session_start();
include ('conn.php');

// Manage Hsn

if(isset($_POST['checking_edit_btn2']))
{
    $hsn_id = $_POST['hsn_id'];
    // echo $return = "this is hsn id".$hsn_id;

    $result_array = [];


    $query = "SELECT * FROM hsn_number WHERE id='$hsn_id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    }
    else
    {
        echo $return = "<h5>No Record Found</h5>";
    }
}

if(isset($_POST['update_hsn']))
{
    $id = $_POST['id'];
    $hsn = $_POST['hsn'];

    $query = "UPDATE hsn_number SET hsn='$hsn' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        // echo "Category Updated Successfull";
        header('Location: mhsn.php');
    }

    else
    {
        // echo "Sorry Not Updated";
        header('Location: mhsn.php');
    }


}


?>





<?php
include ('conn.php');

// Manage Product items 


if(isset($_POST['checking_edit_btn3']))
{
    $product_id = $_POST['product_id'];
    // echo $return = "this is hsn id".$hsn_id;

    $result_array = [];


    $query = "SELECT * FROM products WHERE id='$product_id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    }
    else
    {
        echo $return = "<h5>No Record Found</h5>";
    }
}

if(isset($_POST['update_product']))
{
    $pid = $_POST['pid'];
    $hsn = $_POST['product_Hsn'];
    $product_name = $_POST['pName'];
    $product_description = $_POST['pDes'];
    $product_price = $_POST['pPrice'];
    $product_units = $_POST['units'];
    $product_qty = $_POST['pQty'];

    $query = "UPDATE `products` SET `product_description`='['$product_description']',`product_hsn`='['$hsn']',`product_name`='['$product_name']',`product_price`='['$product_price']',`units`='['$product_units']',`product_qty`='['$product_qty']' WHERE id='$pid' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        // echo "Category Updated Successfull";
        header('Location: mProduct.php');
    }

    else
    {
        echo "Sorry Not Updated";
        // header('Location: mProduct.php');
    }


}


?>