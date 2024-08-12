<?php 
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
    nav{
        height:100%;
        border: 1px solid red;
        position: fixed;
        top:0;
        left:0;
        width:auto;
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-flow: column wrap;

    }
    
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
    } 
    form{
        margin:0px;
        padding:0px;
    }
    </style>
</head>
<body>
   
<nav>
<a href="itemlist.php">Items List</a>
  <a href="ordered.php">Ordered Items</a>
  <a href="accept.php">Accept Orders</a>
  <a href="cancel.php">Cancel Orders</a>
  <a href="notification.php">Notification</a>
  <a href="admin.php">Add Item</a>
    </nav>
   
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">
<table> 
    <tr>
        <td> <label>Type </td> 
        <td><input type="text" name="type"></label></td>
    </tr>
    <tr>
        <td><label>Size </td>
        <td><input type="text" name="size"></label>
        </td>
    </tr>
    <tr>
    <td><label>Color</td>
    <td><input type="text" name="color"></label></td>
    </tr>
    <tr>
    <td><label>Price </td>
    <td><input type="text" name="price"></label>
    </td>
    </tr>
    <tr>
 
<td><label>Gender</td>
    <td><input type="text" name="gender"></label></td>
    </tr>
    <tr>
    <td><label>In stock quantity</td>
    <td><input type="number" name="instock"></label></td>
    </tr>
    <tr>
    <td><label>Image</td>
    <td><input type="file" name="image" accept="img/*"></label></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="Post" value="Post">
    </td>
    </tr>

 
 
</table>
</form>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
$type=filter_input(INPUT_POST,"type",FILTER_SANITIZE_SPECIAL_CHARS);
$size=filter_input(INPUT_POST,"size",FILTER_SANITIZE_SPECIAL_CHARS);
$color=filter_input(INPUT_POST,"color",FILTER_SANITIZE_SPECIAL_CHARS);
$gender=filter_input(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
$price=filter_input(INPUT_POST,"price",FILTER_VALIDATE_INT);
$instock=filter_input(INPUT_POST,"instock",FILTER_VALIDATE_INT);

if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
    $image=$_FILES["image"]["tmp_name"];
    $image_content=file_get_contents($image);
    $statement=$con->prepare("INSERT INTO closet (type,size,price,color,gender,instock,image) VALUES ('$type','$size','$price','$color','$gender','$instock',?)");
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