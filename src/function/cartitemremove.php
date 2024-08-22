<?php
include("../function/connection.php");

include("../function/functions.php");
if(isset($_POST["remove"])){
    ob_start();
    $cart_id=$_POST["cart_id"];
    $clo_id=$_POST["clo_id"];
    $quantity=$_POST["quantity"];
    $size=$_POST["size"];

    echo $cart_id;
    echo $clo_id;
    echo $quantity;
   echo $size;
  
   removeitemfromcart($size,$quantity,$clo_id);
   deletcartcartid($cart_id);
   header("Location:../pages/Cart.php");
   

    ob_end_flush();
}

?>