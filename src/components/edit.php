<?php 
include("connection.php");
session_start(); 
$user_id=$_SESSION["user_id"]; 

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
            background-image: url(premium\ pic/modern.jpg);
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
<body>
    <a href="home.php">Back</a>
    <?php
    ob_start();
$result=$con->query("SELECT * FROM customers  WHERE cus_id='$user_id'");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){?>
 <div class="profile">
 <img   src="data:image/jepg;base64,<?php echo base64_encode($row["per_img"]) ?>" alt="" style="max-height:300px;max-width:250px;border-radius:20px;" >
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">
<label for="" style="color:lightgray;fontsize:13px"> <input type="text"  value="<?php echo $row["user_name"] ?>" name="user_name" style="border:none;font-size:larger;color:white;background-color:transparent;"> <br>Tap to change the username </label><br>
    <hr>
    <label for="" style="color:lightgray;fontsize:13px"> <input type="text" value="<?php echo $row["address"] ?>" name="address" style="border:none; font-size:large;color:white;background-color:transparent;"> <br> Tap to change the address </label><br>
    <hr>
    <label for="" style="color:lightgray;fontsize:13px"> <input type="text" value="<?php echo $row["ph_no"] ?>" name="connum" style="border:none; font-size:large;color:white;background-color:transparent;">  <br>Tap to change the contact number </label><br>
    <hr>
<label style="color:lightgray;font-size:15px"><input style="border-radius:10px;background-color:green;" type="file" name="image" accept="img/*"> <br>Choose a Profile picture</label> <br><hr>
<input id="save" style=" background-color:green;color:white;padding:10px 20px;margin-left:35%;margin-top:20px;border-radius:10px;font-weight:bold;font-size:17px;" type="submit" name="Post" value="Save">
</div> 
<?php
 }}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_name=$_POST["user_name"];
    $address=$_POST["address"];
    $ph_no=$_POST["connum"];
    if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
        $image=$_FILES["image"]["tmp_name"];
        $image_content=file_get_contents($image);
        $statement=$con->prepare("UPDATE customers SET user_name='$user_name', address='$address' , ph_no='$ph_no', per_img=? where cus_id='$user_id'");
        $statement->bind_param("s",$image_content);
        $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
     if($current_id){
        header("Location:edit.php");

       
         
     } 
     else {
         echo"fail to insert";
     }
      }
      else{ 
        try{
            $con->query("UPDATE customers SET user_name='$user_name', address='$address' , ph_no='$ph_no' where cus_id='$user_id'");
            header("Location:edit.php");

            ob_end_flush();

        }catch(mysqli_sql_exception){

        }

      }
    } 
 
?> 



</body>
</html>