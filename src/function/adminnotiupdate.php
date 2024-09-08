<?php

include("./connection.php");
include("./functions.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $success=true;
    $productname=$_POST["productname"];
    $productdesc=$_POST["productdesc"];
     $item_id=$_POST["item_id"];
    $type=$_POST["type"];
    $small=$_POST["small"];
    $medium=$_POST["medium"];
    $large=$_POST["large"];
    $XL=$_POST["XL"];
    $XXL=$_POST["XXL"];
    $price=$_POST["price"];
    $gender=$_POST["gender"];
    $instock=$small+$medium+$large+$XL+$XXL;
    try{
        $con->query("UPDATE closet SET type='$type',price='$price',gender='$gender',instock='$instock',productname='$productname',productdesc='$productdesc' where clo_id='$item_id'");
        adminsize($item_id,$small,$medium,$large,$XL,$XXL);
        $_SESSION["update"]=true;
        header("Location:../admin/components/update.php?item_id=$item_id ");
    }catch(mysqli_sql_exception){
        echo "update error";
    }
   
            ob_end_flush();

       
} 
 
?> 