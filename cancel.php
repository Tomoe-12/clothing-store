<?php 
include("connection.php");

function update($a,$b){ 
    include("connection.php");
$con->query("UPDATE orderhistory set admindec='$a' where his_id='$b'");    
} 
function cancel($x,$y){
    include("connection.php");
    $con->query("UPDATE closet set instock='$x' where clo_id='$y'");    
}
function cancell($z,$i){
    include("connection.php");
    $con->query("UPDATE orderhistory set quantity='$z' where his_id='$i'"); 
}
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
       
      
    }
    table,tr{
width:80%;
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
  <a href="cancel.php">Cancel Orders</a>
  <a href="notification.php">Notification</a>
  <a href="admin.php">Add Item</a>
    </nav>
    <table>
    <tr>
        <th>User name</th>
        <th>E-mail</th>
        <th>Contact No</th>
        <th>Image</th>
        <th>Type</th>
        <th>Size</th>
        <th>Price</th>
        <th>Address</th>
         <th>Quantity</th>
         <th>Status</th>
         


    </tr>
    <?php
  
    $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id where admindec='Cancel' ");
    if(!empty($result)&& $result->num_rows>0){
       while($row=$result->fetch_assoc()){ 
       
   ?>
           <tr  >
            
           <td ><?php echo $row["user_name"] ?></td>
            <td ><?php echo $row["email"] ?></td>
            <td ><?php echo $row["ph_no"] ?></td> 
            <td style="padding: 0px;margin:0px"> <img  src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt="" style="height:100px;width:100pxo;" >
            </td>

            <td ><?php echo $row["type"] ?></td> 
            <td ><?php echo $row["size"] ?></td>
            <td ><?php echo $row["price"] ?></td>
            <td ><?php echo $row["address"] ?></td>
          
            <form action="cancel.php" method="get">
            <?php
        
                switch($row["admindec"]){ 
                    case"Pending":
                    
                    ?>
                    <td><select name="dec">
                        <option name="dec" value="<?php echo $row["admindec"] ?>"><?php echo $row["admindec"] ?></option>
                        <option name="dec" value="Accept">Accept</option>
                        <option  name="dec" value="Cancel">Cancel</option>
                        
                        </select></td><?php ;break; 
                    case"Accept":?><td ><select name="dec">
                        <option name="dec" value="<?php echo $row["admindec"] ?>"><?php echo $row["admindec"] ?></option>
                        <option name="dec" value="Pending">Pending</option>
                        <option name="dec" value="Cancel">Cancel</option>
                        
                        </select></td><?php ;break;
                    case"Cancel": ?> 
                      <td ><?php echo $row["quantity"] ?></td>
                    <td > <?php echo $row["admindec"] ?> </td><?php ;break;   
                }  

                 
                ?>
                <input type="text" style="display:none" value="<?php echo $row["his_id"] ?>" name="his_id"><br>

 
    </form>
</tr>

    <?php }}?>
    </table>
    
    
</body>
</html>