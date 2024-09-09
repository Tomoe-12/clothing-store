

<?php 
    
    include("../function/connection.php");
include("../function/functions.php");

    
       ob_start();
        $dec="Accept";
       
        $cus_id=$_GET["cus_id"];
        $or_date=$_GET["or_date"];


        echo "hello";

       switch($dec){
        
        case"Accept":  update3($dec,$cus_id,$or_date)  ;break;
       }

       
       
      

       header("Location:../admin/components/ordered.php");
        ob_end_flush();
    
    
    
    ?>