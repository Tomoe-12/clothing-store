<?php 
include("../function/connection.php");
include("../function/functions.php");

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
  
  <a href="notification.php">Notification</a>
  <a href="admin.php">Add Item</a>
    </nav>
   
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">
<table > 
    <tr>
        <td> <label>Type </td> 
        <td><input type="text" name="type"></label></td>
    </tr>
    <tr>
        <td><label>Small </td>
        <td><input type="number" name="small" value="0"></label>
        </td>
    </tr>
    <tr>
        <td><label>Medium </td>
        <td><input type="number" name="medium" value="0"></label>
        </td>
        </tr>
        <tr>
        <td><label>Large </td>
        <td><input type="number" name="large" value="0"></label>
        </td>
        </tr>
        <tr>
        <td><label>XL </td>
        <td><input type="number" name="XL" value="0"></label>
        </td>
        </tr>
        <tr>
        <td><label>XXL </td>
        <td><input type="number" name="XXL" value="0"></label>
        </td>
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
$small=filter_input(INPUT_POST,"small",FILTER_VALIDATE_INT);
$medium=filter_input(INPUT_POST,"medium",FILTER_VALIDATE_INT);
$large=filter_input(INPUT_POST,"large",FILTER_VALIDATE_INT);
$XL=filter_input(INPUT_POST,"XL",FILTER_VALIDATE_INT);
$XXL=filter_input(INPUT_POST,"XXL",FILTER_VALIDATE_INT);
$gender=filter_input(INPUT_POST,"gender",FILTER_SANITIZE_SPECIAL_CHARS);
$price=filter_input(INPUT_POST,"price",FILTER_VALIDATE_INT);
$instock=$small+$medium+$large+$XL+$XXL;

if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
   
    $image=$_FILES["image"]["tmp_name"];
    $image_content=file_get_contents($image);

    $statement=$con->prepare("INSERT INTO closet (type,price,gender,instock,image) VALUES ('$type','$price','$gender','$instock',?)");
    $statement->bind_param("s",$image_content);
    $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
 if($current_id){
     echo"inserted successfully<a href='home.php'>view all images</a>";
     size($small,$medium,$large,$XL,$XXL);
     
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