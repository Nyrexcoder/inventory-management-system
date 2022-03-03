<?php
require_once ("conn.php");
session_start();
if(isset($_POST['login']))
{
    if(empty($_POST['username']) || empty($_POST['password'])){
        header("location:index.php?Empty=Please Fill in the Blanks");
    }else{
        $query = "SELECT * FROM user WHERE username='".$_POST['username']."' and password='".$_POST['password']."'";
        $result= mysqli_query($conn, $query);

        if(mysqli_fetch_assoc($result))
        {
            $_SESSION['user']=$_POST['username'];
            header("location:dashboard.php");
        }
        else
        {
            header("location:index.php?Invalid=Please Enter Correct user name and password");
        }
    }
}
else{
    echo"Not Working";
}



?>