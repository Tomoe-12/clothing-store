<?php 
session_start();
if(session_destroy()){
    header("Location:../pages/home.php");
}
?>