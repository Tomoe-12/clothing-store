

<?php 
    
    include("../function/connection.php");
include("../function/functions.php");

    if(isset($_GET["save"])){
       ob_start();
        $dec="Accept";
       
        $cus_id=$_GET["cus_id"];
        $or_date=$_GET["or_date"];


        

       switch($dec){
        case"Cancel": update1($dec,$his_id,0);
                    update2($upinstock,$clo_id);break;

        case"Pending":  update3($dec,$his_id)  ;break;
        case"Accept":  update3($dec,$cus_id,$or_date)  ;break;

       }
       
      

       header("Location:../admin/components/ordered.php");
        ob_end_flush();
    }
    
    
    ?>