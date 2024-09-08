<?php

session_start();
include("../function/connection.php");
 
include("../function/functions.php");


function select(){
    ;include("../function/connection.php");
    $arr=array();
    $cus_id=$_SESSION["user_id"];
    $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id where   orderhistory.cus_id='$cus_id' group by orderhistory.or_date order by orderhistory.or_date desc");
    if(!empty($result)&& $result->num_rows>0){
       while($row=$result->fetch_assoc()){  
              array_push($arr,$row["or_date"]);

       }}
       return $arr;
}


    
$cus_id=$_SESSION["user_id"];
$array=select(); 
foreach($array as $arr) {
    $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id where   orderhistory.cus_id='$cus_id' and orderhistory.or_date='$arr' ");
    if(!empty($result)&& $result->num_rows>0){
       while($row=$result->fetch_assoc()){  ?>
           <img src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>" alt=""> 
           <div
                                                style='width: 20px; height: 20px; border-radius:50%; background-color:<?Php echo $row["or_color"]?>'>
                                            </div>    

     <?php   }}
        echo "<br>";
}    
?>
