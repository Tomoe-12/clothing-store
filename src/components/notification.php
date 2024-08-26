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
        align-items: center;
        justify-content: center;
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
    <table>
    <tr>
        <th>Image</th>
        <th>Type</th>
        <th colspan="5"> Size</th>
        
        <th>Price</th>
        <th>Instock</th>
        <th colspan="2">Action</th>
    </tr>
    <tr>
    <th></th>
        <th></th>
       
        <th>Small</th>
        <th>Medium</th>
        <th>Large</th>
        <th>XL</th>
        <th>XXL</th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
    </tr>
    <?php
    
$result=$con->query("SELECT * FROM closet JOIN size ON closet.clo_id=size.clo_id where Small<=3 or Medium<=3 or Large<=3 or XL<=3 or XXL<=3  order by type  ");
if(!empty($result)&& $result->num_rows>0){
 while($row=$result->fetch_assoc()){ ?>
<tr>
    <td style="padding: 0px;margin:0px"> <img   src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>" alt="" style="height:100px;width:100pxo;" >
    </td>
    <td><?php echo $row["type"] ?></td>
    <td><?php echo $row["Small"] ?></td>
    <td><?php echo $row["Medium"] ?></td>
    <td><?php echo $row["Large"] ?></td>
    <td><?php echo $row["XL"] ?></td>
    <td><?php echo $row["XXL"] ?></td>
    <td><?php echo $row["price"] ?></td>
    <td><?php echo $row["instock"] ?></td>
    <td><a href="update.php?item_id=<?php echo $row["clo_id"] ?>">Edit</a></td>

    <td><form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="text" value="<?php echo $row["clo_id"] ?>" name="clo_id" style="display:none;">
        <input type="submit" value="Delete">
    </form></td>

</tr>


    <?php }}?>
    </table>
</body>
</html>
<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    $clo_id=filter_input(INPUT_POST,"clo_id",FILTER_VALIDATE_INT);

deletecloset($clo_id);
deletesize($clo_id);
deleimg($clo_id);

 header("Location:itemlist.php");
ob_end_flush();

}
?>