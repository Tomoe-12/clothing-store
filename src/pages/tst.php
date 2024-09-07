<?php 
include("../function/connection.php");
session_start(); 
include("../function/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$result=$con->query("SELECT * FROM closet_img  where clo_id=119");
if(!empty($result)&& $result->num_rows>0){
 while($row=$result->fetch_assoc()){  ?>
 <img class="peer absolute top-0 right-0 h-full w-full object-cover"
                        src="data:image/jepg;base64,<?php echo base64_encode($row["img"]) ?>"
                        alt="product image" />
<?php
 }}
    ?>
</body>
</html>