<?php 

include("connection.php");
include("functions.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
ob_start();
    $selectcolor=$_POST["selectcolor"];

    $color=$_POST["color"];
    $orderprice=$_POST["orderprice"];
    $clo_id=$_POST["clo_id"];
    $size=$_POST["size"];
    $quantity=$_POST["quantity"];
    $price=$_POST["price"];
    $cart_id=$_POST["cart_id"];
    echo $color;
    echo $cart_id;
    echo $price;
    echo $size;
    echo $quantity;
  
        $orquantity=filter_input(INPUT_POST,"orquantity",FILTER_VALIDATE_INT); 
        echo $orquantity;   
    $orsize=$_POST["orsize"];
    
   /*  if(isset($color)){
        $_SESSION["update"]="success";
        updatecart($orquantity,$size,$orderprice,$color,$cart_id);
    }

    if(empty($orsize)){
        $orsize=$size;
        if(empty($color)){
            $color=$selectcolor;
            switch($orsize){
                case"small":  $realprice=$price+0;break;
                case"medium": $realprice=$price+2000;break;
                case"large": $realprice=$price+4000;break;
                case"XL": $realprice=$price+6000;break;
                case"XXL":$realprice=$price+8000;break;
            }
            $updateprice=$realprice*$orquantity;

             $_SESSION["update"]="success";
             updatecart($orquantity,$orsize,$updateprice,$color,$cart_id);
        }
    }

    
      
 
      
      if($orsize==$size){
          if($orquantity==$quantity){

          
          if($color==$selectcolor){
            $_SESSION["update"]="success";
            updatecart($orquantity,$orsize,$orderprice,$color,$cart_id);
  
          }
         
        } 
  
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
              echo "done";
              switch($orsize){
                  case"small":  $realprice=$price+0;break;
                  case"medium": $realprice=$price+2000;break;
                  case"large": $realprice=$price+4000;break;
                  case"XL": $realprice=$price+6000;break;
                  case"XXL":$realprice=$price+8000;break;
              }
              $updateprice=$realprice*$orquantity;
              updatecart($orquantity,$orsize,$updateprice,$selectcolor,$cart_id);
             
              $_SESSION["update"]="success";
      
      
          }

          }
           
          
          
          
        
         
        
         
       */
      if(empty($color) && empty($orsize) && $quantity==$orquantity){
                $_SESSION["update"]="success";
                updatecart($orquantity,$size,$orderprice,$selectcolor,$cart_id); 
        }else if(isset($color) && isset($orsize)){
           
                $sizequan = sizequantity($size,$clo_id);
                $originquan=$sizequan+$quantity;
                sizeupdate($size,$originquan,$clo_id);
                $sizequan2=sizequantity($orsize,$clo_id);
              if($sizequan2>$orquantity){
                  $updatequan=$sizequan2-$orquantity;
                  sizeupdate($orsize,$updatequan,$clo_id);
                  switch($orsize){
                    case"small":  $realprice=$price+0;break;
                    case"medium": $realprice=$price+2000;break;
                    case"large": $realprice=$price+4000;break;
                    case"XL": $realprice=$price+6000;break;
                    case"XXL":$realprice=$price+8000;break;
                }
                $updateprice=$realprice*$orquantity;
                $_SESSION["update"]="success";
                updatecart($orquantity,$orsize,$updateprice,$color,$cart_id);
               
               
              }
            }
            else{
                if(isset($color) && empty($orsize) && $quantity==$orquantity){
                    $_SESSION["update"]="success";
                    updatecart($orquantity,$size,$orderprice,$color,$cart_id);
                }
                else if(empty($color) && isset($orsize) ){
                    $sizequan = sizequantity($size,$clo_id);
                    $originquan=$sizequan+$quantity;
                    sizeupdate($size,$originquan,$clo_id);
                    $sizequan2=sizequantity($orsize,$clo_id);
                  if($sizequan2>$orquantity){
                      $updatequan=$sizequan2-$orquantity;
                      sizeupdate($orsize,$updatequan,$clo_id);
                      switch($orsize){
                        case"small":  $realprice=$price+0;break;
                        case"medium": $realprice=$price+2000;break;
                        case"large": $realprice=$price+4000;break;
                        case"XL": $realprice=$price+6000;break;
                        case"XXL":$realprice=$price+8000;break;
                    }
                    $updateprice=$realprice*$orquantity;
                    $_SESSION["update"]="success";
                    updatecart($orquantity,$orsize,$updateprice,$selectcolor,$cart_id);
                   
                   
                  }
                } else if( empty($color)  && empty($orsize) && $quantity!=$orquantity){
                    $sizequan = sizequantity($size,$clo_id);
                    $originquan=$sizequan+$quantity;
                    sizeupdate($size,$originquan,$clo_id);
                    $sizequan2=sizequantity($size,$clo_id);
                  if($sizequan2>$orquantity || $sizequan2==$orquantity){
                      $updatequan=$sizequan2-$orquantity;
                      sizeupdate($size,$updatequan,$clo_id);
                      switch($size){
                        case"small":  $realprice=$price+0;break;
                        case"medium": $realprice=$price+2000;break;
                        case"large": $realprice=$price+4000;break;
                        case"XL": $realprice=$price+6000;break;
                        case"XXL":$realprice=$price+8000;break;
                    }
                    $updateprice=$realprice*$orquantity;
                    $_SESSION["update"]="success";
                    updatecart($orquantity,$size,$updateprice,$selectcolor,$cart_id);
                   
                   
                  }      
                } else if (isset($color) && $quantity!=$orquantity){
                    $sizequan = sizequantity($size,$clo_id);
                    $originquan=$sizequan+$quantity;
                    sizeupdate($size,$originquan,$clo_id);
                    $sizequan2=sizequantity($size,$clo_id);
                  if($sizequan2>$orquantity || $sizequan2==$orquantity){
                      $updatequan=$sizequan2-$orquantity;
                      sizeupdate($size,$updatequan,$clo_id);
                      switch($size){
                        case"small":  $realprice=$price+0;break;
                        case"medium": $realprice=$price+2000;break;
                        case"large": $realprice=$price+4000;break;
                        case"XL": $realprice=$price+6000;break;
                        case"XXL":$realprice=$price+8000;break;
                    }
                    $updateprice=$realprice*$orquantity;
                    $_SESSION["update"]="success";
                    updatecart($orquantity,$size,$updateprice,$color,$cart_id);
                   
                   
                  }   
                }

               
            }
        

       


      
     
        if($_SESSION["update"] =="success"){
          header("Location:../pages/Cart.php");
  
        }
    
    ob_end_flush();
   

    
      
 
      
    
    }
        


    ?>
  