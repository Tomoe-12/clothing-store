<?php
include("../function/connection.php");

include("../function/functions.php");
if(isset($_POST["submit"])){
    ob_start();
    $user_id=$_POST["user_id"];
    movtoorder($user_id);
    deletcart($user_id);
    header("Location:../pages/Cart.php");
    ob_end_flush();
}

?>