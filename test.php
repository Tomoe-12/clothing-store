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