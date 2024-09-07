<?php 
include("../../function/connection.php");
include("../../function/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .profile{
            box-shadow: 6px 6px 6px  5px black;
            width:250px;
            height:auto;
            padding:20px 20px 20px 20px;
            border-radius: 10px;
            background-color: transparent;
            backdrop-filter: blur(70px);
            display: flex;
            flex-flow: column wrap;
            align-items: center;
            justify-content: center;
        }
        .profile>form{
            margin-top: 20px;
        }
        .profile>form>input{
            font-size: 16px;
            font-weight: bold;
            border:none;
            
            
        }
        
        
        body{
            background-image: url(premium\ pic/update.jpg);
            background-repeat: no-repeat;
            background-size: cover; 
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh; 
        }
       
        a{
            position: absolute;
            top:10px;
            left:10px;
            background-color: rgba(55, 120, 232, 0.885);
            color:white;
            font-size: 17px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
         }
         
         #save:hover{
            cursor: pointer;          
         }
         
    </style>
</head>
<body> <?php  if($_GET["noti"]=="noti"){?>
    <a href="notification.php">Back</a>
     <?php }?>
     <?php  if($_GET["noti"]=="home"){?>
    <a href="../home.php">Back</a>
     <?php }?>
     
    <?php

    ob_start();
    
    $item_id=$_GET["item_id"];
$result=$con->query("SELECT * FROM  closet join size ON closet.clo_id=size.clo_id WHERE closet.clo_id='$item_id'");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){?>
 <div class="profile">
 <img   src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>" alt="" style="max-height:300px;max-width:250px;border-radius:20px;" >
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">
<label for="" style="color:gray;fontsize:13px"> <input type="text"  value="<?php echo $row["type"] ?>" name="type" style="border:none;font-size:larger;color:black;background-color:transparent;"> <br>Tap to change the type of clothe </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["Small"] ?>" name="Small" style="border:none; font-size:large;color:black;background-color:transparent;"> <br> Tap to change the quantity of Small size </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["Medium"] ?>" name="Medium" style="border:none; font-size:large;color:black;background-color:transparent;"> <br> Tap to change the quantity of Medium size </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["Large"] ?>" name="Large" style="border:none; font-size:large;color:black;background-color:transparent;"> <br> Tap to change the quantity of Large size </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["XL"] ?>" name="XL" style="border:none; font-size:large;color:black;background-color:transparent;"> <br> Tap to change the quantity of XL size </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["XXL"] ?>" name="XXL" style="border:none; font-size:large;color:black;background-color:transparent;"> <br> Tap to change the quantity of XXL size </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["price"] ?>" name="price" style="border:none; font-size:large;color:black;background-color:transparent;">  <br>Tap to change the price of clothe </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["gender"] ?>" name="gender" style="border:none; font-size:large;color:black;background-color:transparent;">  <br>Tap to change the gender type of clothe </label><br>
    <hr>
    <label for="" style="color:gray;fontsize:13px"> <input type="text" value="<?php echo $row["instock"] ?>" name="instock" style="border:none; font-size:large;color:black;background-color:transparent;">  <br>Tap to change the gender type of clothe </label><br>
    <hr>
<label style="color:gray;font-size:15px"><input style="border-radius:10px;background-color:green;" type="file" name="image" accept="img/*"> <br>Choose a picture of clothe</label> <br><hr>
<input id="save" style=" background-color:green;color:white;padding:10px 20px;margin-left:35%;margin-top:20px;border-radius:10px;font-weight:bold;font-size:17px;" type="submit" name="Post" value="Save">
</div> 
<?php
 }}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $type=$_POST["type"];
    $small=$_POST["Small"];
    $medium=$_POST["Medium"];
    $large=$_POST["Large"];
    $XL=$_POST["XL"];
    $XXL=$_POST["XXL"];
    $price=$_POST["price"];
    $gender=$_POST["gender"];
    $instock=$small+$medium+$large+$XL+$XXL;
    if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
        adminsize($item_id,$small,$medium,$large,$XL,$XXL);
        $image=$_FILES["image"]["tmp_name"];
        $image_content=file_get_contents($image);
        $statement=$con->prepare("UPDATE closet SET type='$type', price='$price',gender='$gender',instock='$instock', image=? where clo_id='$item_id'");
        $statement->bind_param("s",$image_content);
        $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
     if($current_id){
      
        header("Location:update.php?item_id=$item_id");
       
         
     } 
     else {
         echo"fail to insert";
     }
      }
      else{ 
        try{
            $con->query("UPDATE closet SET type='$type',price='$price',gender='$gender',instock='$instock' where clo_id='$item_id'");
         adminsize($item_id,$small,$medium,$large,$XL,$XXL);
         header("Location:update.php?item_id=$item_id");

            ob_end_flush();

        }catch(mysqli_sql_exception){

        }

      }
    } 
 
?> 



</body>
</html>