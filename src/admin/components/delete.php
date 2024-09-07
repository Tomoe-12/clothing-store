<?php 

include("../../function/connection.php");
include("../../function/functions.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    $clo_id=filter_input(INPUT_POST,"clo_id",FILTER_VALIDATE_INT);

deletecloset($clo_id);
deletesize($clo_id);
deleimg($clo_id);
 header("Location:../../admin/home.php");

}
?>
