<?php  
try{
    $con=mysqli_connect("localhost","root","","project");
    

}catch (mysqli_sql_exception){
    echo"Could not connect";
}

?>