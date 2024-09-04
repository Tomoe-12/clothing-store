<?php

session_start();
include("../function/connection.php");
 
include("../function/functions.php");


ob_start();
    $cus_id=$_SESSION["user_id"];
    $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id where admindec='Accept' and  orderhistory.cus_id='$cus_id' ");
    if(!empty($result)&& $result->num_rows>0){
       while($row=$result->fetch_assoc()){ 
                  echo "your item will be arrived next 3 days" ."<br>";


       }}

       
?>
