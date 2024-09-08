<?php

session_start();
include("../function/connection.php");
 
include("../function/functions.php");



    
$cus_id=$_SESSION["user_id"];
$array=select(); 
foreach($array as $arr) { 
    echo  admindec($arr,$cus_id)." ";
 echo   subtotal3($arr,$cus_id); echo  " ".$arr;?>
<div class="class" style="border: 1px solid black;"></div>
<?php
    $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id where   orderhistory.cus_id='$cus_id' and orderhistory.or_date='$arr' ");
    if(!empty($result)&& $result->num_rows>0){
       while($row=$result->fetch_assoc()){  ?>
           <img src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>" alt=""> 
           <div
        style='width: 20px; height: 20px; border-radius:50%; background-color:<?Php echo $row["or_color"]?>'>
            </div> 
            <div><?php echo $row["orderprice"]?></div> 
            <div><?php echo $row["productname"]?></div>     

     <?php   }} ?>
     </div>
        <?php
}    
?>
