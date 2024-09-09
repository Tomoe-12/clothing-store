<?php

include("./connection.php");
include("./functions.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $success=true;
    $colors = $_POST['colors']; // This will be an array of hex codes (e.g., ['#ff0000', '#00ff00', '#0000ff'])

    // Convert the colors array to a string for storage, e.g., using JSON or comma-separated values
    $colorsString = json_encode($colors);
    $noti=$_POST["noti"];
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
        $con->query("UPDATE closet SET type='$type',price='$price',gender='$gender',instock='$instock',productname='$productname',productdesc='$productdesc' ,color='$colorsString' where clo_id='$item_id'");
        adminsize($item_id,$small,$medium,$large,$XL,$XXL);
        $_SESSION["update"]=true;
        if($noti=="home"){  
            
     header("Location:../admin/home.php ");
        } else if($noti=="noti"){
           
            header("Location:../admin/components/notification.php ");
  
        }
      
    }catch(mysqli_sql_exception){
        echo "update error";
    }
   
            ob_end_flush();

       
} 
 
?>