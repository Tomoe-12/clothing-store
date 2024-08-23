<?php
include("../function/connection.php");
session_start();
include("../function/functions.php");
if(isset($_POST["submit"])){
    ob_start();
    $user_id=$_POST["user_id"];
    movtoorder($user_id);
    deletcart($user_id);
    $_SESSION["res"]="success";
    header("Location:../pages/Cart.php");
   
    ob_end_flush();
}

?>