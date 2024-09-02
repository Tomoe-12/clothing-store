<?php 
include("connection.php");
include("functions.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
         $orderprice=$_POST["orderprice"];
    $clo_id=$_POST["clo_id"];
    $size=$_POST["size"];
    $quantity=$_POST["quantity"];
    $price=$_POST["price"];
    $cart_id=$_POST["cart_id"];
echo  $cart_id;
    echo $price;
    echo $size;
    echo $quantity;
        $orquantity=filter_input(INPUT_POST,"orquantity",FILTER_VALIDATE_INT);    
    $orsize=$_POST["orsize"];
    
    
    if(empty($orsize)){
          $orsize=$size;
        if($orquantity==$quantity){
           
            updatecart($orquantity,$orsize,$orderprice,$cart_id);

               $_SESSION["update"]="success";
              
        }
    
    }
    if($orsize==$size){
        if($orquantity==$quantity)
        $_SESSION["update"]="success";

        

    } 
    
    if($orsize!=$size){


        $sizequan = sizequantity($size,$clo_id);
        $originquan=$sizequan+$quantity;
        echo $originquan;
        sizeupdate($size,$originquan,$clo_id);
        if(isset($orsize)){
            $sizequan2=sizequantity($orsize,$clo_id);
            if($sizequan2>$orquantity){
                $updatequan=$sizequan2-$orquantity;
                sizeupdate($orsize,$updatequan,$clo_id);
            }
        }
       
      
        echo "done";
        switch($orsize){
            case"small":  $realprice=$price+0;break;
            case"medium": $realprice=$price+2000;break;
            case"large": $realprice=$price+4000;break;
            case"XL": $realprice=$price+6000;break;
            case"XXL":$realprice=$price+8000;break;
        }
        $updateprice=$realprice*$orquantity;
        updatecart($orquantity,$orsize,$updateprice,$cart_id);
       
        $_SESSION["update"]="success";


    }
    
   
      if($_SESSION["update"] =="success"){
        header("Location:../pages/Cart.php");

      }
  
 
        } 

    ?>
  