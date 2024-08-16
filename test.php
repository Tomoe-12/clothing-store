<?php 
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">

<label>Image <input type="file" name="image" accept="img/*"></label><br>
<input type="submit" name="save" value="Post">
</form>
<?php 
if(isset($_POST["save"])){


if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
    $image=$_FILES["image"]["tmp_name"];
    $image_content=file_get_contents($image);
    $statement=$con->prepare("UPDATE  customers  SET per_img=? where cus_id=1");
    $statement->bind_param("s",$image_content);
    $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
 if($current_id){
     echo"inserted successfully<a href='home.php'>view all images</a>";
     
 } 
 else {
     echo"fail to insert";
 }
  }
  else{
    echo "please select an image";
  }
} 
$con->close();


?>
</body>
</html>










<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> -->
     <!-- <a href="../pages/home.php">Back</a>
    <div class="signupbox">

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> -->
    <!-- <h1>Sign Up</h1>
    <input type="text" name="username" placeholder="User name" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="pass" placeholder="Password" maxlength="10" required>
    <input type="password" name="repass" placeholder="Confirm Password" maxlength="10" required>
    <input type="text" name="ph_no" placeholder="Contact Number" required>
    <input type="textarea" name="address" placeholder="Address" required>
    <input type="submit" name="Login" value="Sign Up">
    <div id="success" style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:green;border-radius:10px;"> Sign Up Successfully</div>
<div id="unsuccess" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;">Already have an account .Please Login ! </div>
<div id="pass" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;"> Password and confirm password must be the same!</div>
<div id="complete" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;"> Please fill the form completely!</div> -->

    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->