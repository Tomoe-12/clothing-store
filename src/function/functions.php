<?php 

function update1($a,$b,$c){ 
    include("connection.php");
$con->query("UPDATE orderhistory set admindec='$a' ,quantity='$c' where his_id='$b'");    
} 
function update2($x,$y){
    include("connection.php");
$con->query("UPDATE closet set instock='$x' where clo_id='$y'");    
}

function update3($d,$e,){ 
    include("connection.php");
$con->query("UPDATE orderhistory set admindec='$d'  where his_id='$e'");    
} 

function update($a,$b){ 
    include("connection.php");
$con->query("UPDATE closet set instock='$a' where clo_id='$b'");    
} 
function profileimgvalidate($user_id){
    include("connection.php");
$result=$con->query("SELECT * FROM customers  WHERE cus_id=$user_id");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){
        if(empty($row["per_img"])){
return false;
        }
        if(isset($row["per_img"])){
            return true;
        }
  }}
}
?>