<?php 
include("connection.php");
if(isset($_GET["searchadmin"])){
$item=$_GET["seaitem"];
}
?>
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
    table>tr>th,td{
        text-align: center;
       border: 1px solid black;
       padding:30px;
      
    }
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
        flex-flow: column wrap;
        align-items: center;
        justify-content: center;
    }
    .form{
        display: block;
        width: 100%;
        height:50px;
        display: flex;
        align-items: center;
        justify-content: center;
        
    }
   
    </style>
</head>
<body>
    <nav>
    <a href="./itemlist.php">Items List</a>
  <a href="ordered.php">Ordered Items</a>
  <a href="accept.php">Accept Orders</a>
  <a href="cancel.php">Cancel Orders</a>
  <a href="notification.php">Notification</a>
  <a href="admin.php">Add Item</a>
    </nav>
    <div class="form">
    <form action="adminsearch.php" method="get">
        <input type="text" name="seaitem">
        <input type="submit" name="searchadmin" value="search">
    </form>
    </div>
   
    <table>
    <tr>
        <th>Image</th>
        <th>Type</th>
        <th>Size</th>
        <th>Price</th>
        <th>Instock</th>
        <th>Action</th>
    </tr>
    <?php
    
$result=$con->query("SELECT * FROM closet  where type='$item' order by price ");
if(!empty($result)&& $result->num_rows>0){
 while($row=$result->fetch_assoc()){ ?>
<tr>
    <td style="padding: 0px;margin:0px"> <img  src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt="" style="height:100px;width:100pxo;" >
    </td>
    <td><?php echo $row["type"] ?></td>
    <td><?php echo $row["size"] ?></td>
    <td><?php echo $row["price"] ?></td>
    <td><?php echo $row["instock"] ?></td>
    <td><a href="update.php?item_id=<?php echo $row["clo_id"] ?>">Edit</a></td>

</tr>

    <?php }}?>
    </table>
    
</body>
</html>