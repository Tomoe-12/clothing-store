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
?>