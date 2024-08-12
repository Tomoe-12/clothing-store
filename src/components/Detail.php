<?php 
include("../function/connection.php");
session_start();

$key=false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url(premium\ pic/colorful.jpg);
            background-repeat: no-repeat;
            background-size: cover;
           
        }
        a{
            position: absolute;
            top:10px;
            left:10px;
            text-decoration: none;
            font-size: 17px;
            background-color: rgba(55, 120, 232, 0.885);
            color:white;
            padding:10px 20px;
            border-radius: 10px;
        }
        .Detailbox form{
           
            display: flex;
            flex-flow: column wrap;
           justify-content: space-around;
           width:100%;
           height: 100%;
          font-size: 20px;
          font-weight: bold;
          
          
        }
        .Detailbox form input:hover{
cursor: pointer;
        }
        .Detailbox{
           box-shadow: 6px 6px 6px  5px black;
            width:300px;
            height:650px;
            padding:20px;
            border-radius: 10px;
            background-color: transparent;
            backdrop-filter: blur(60px);
        }
       
        #success{
            
            font-size: 16px;
            font-weight: bold;
            display: none;
        }
        #unsuccess{
            
            font-size: 16px;
            font-weight: bold;
            display: none;
        }
        #insufficient
        {
            
            font-size: 16px;
            font-weight: bold;
            display: none;
        }
        #zero
        {
            
            font-size: 16px;
            font-weight: bold;
            display: none;
        }
    </style>
</head>
<body> 

    <a href="../pages/home.php">Back</a>
    <div class="Detailbox">
    <?php 
   $item_id=$_GET["item_id"];
  
  
   $result=$con->query("SELECT * FROM closet WHERE clo_id='$item_id' ");
   if(!empty($result)&& $result->num_rows>0){
    while($row=$result->fetch_assoc()){ 
    
      $instock=$row["instock"];
        ?>
        
    <form action=" <?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<img src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt="Uploaded image" style="width:300px;height:350px; margin-bottom:20px;border-radius:10px;">
<div>Type: <?php echo $row["type"]?></div>
<div>Size: <?php echo $row["size"]?></div>
<div>Price: <?php echo $row["price"]?>KS</div>
<div>In Stock: <?php echo $instock ?></div>
<label for="">Quantity:<input type="number" name="quantity" style="border-radius:10px;padding:5px 10px;border:none; " required></label><br>
<input type="submit" value="Order Now" name="order" style="width:35%;margin-left:33%;padding:8px;border-radius:10px;background-color:green;color:white;font-size:16px;font-weight:bold;">
<div id="success" style="margin-top:10px;text-align:center;background-color:white;padding:10px;color:green;border-radius:10px;"> Order Successfully</div>
<div id="unsuccess" style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:red;border-radius:10px;"> Unable to order. Please Login first!</div>
<div id="zero" style="margin-top:10px;text-align:center; background-color:white;padding:10px;color:red;border-radius:10px;"> Your order quantity must be greater than zero</div>

<div id="insufficient" style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:red;border-radius:10px;"> Insufficient in stock item number</div>

</form>

 
 <?php   }}
  
 
  ?>
    </div>
    <?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        


        if(empty($_SESSION["user_id"])){
            ?>
      <script>
                    document.getElementById("unsuccess").style.display="block";
                </script>
        <?php
        } 
        else {

             
            $quantity=filter_input(INPUT_POST,"quantity",FILTER_VALIDATE_INT);
            if($quantity>0){
            if($instock>$quantity || $instock==$quantity){
                $instock=$instock-$quantity;
                try{
                    $con->query("UPDATE closet SET instock='$instock' WHERE clo_id='$item_id'");
                  $key=true;
                }catch(mysqli_sql_exception){
                    echo"fail to upadate";
                    
                }
            }else{  
                $key=false; ?>
                <script>
                document.getElementById("insufficient").style.display="block";
            </script>
            <?php
            }
        } 
        else{ 
            $key=false;
            ?>
            <script>
            document.getElementById("zero").style.display="block";
        </script>
        <?php 

        } 
        if(!empty($_SESSION["user_id"])){
            $user_id=$_SESSION["user_id"];
          if($_SESSION["user_id"]!=null)  {
           
                if($key){
            try{
                $_SESSION["order_id"]=$item_id;
                $user_id=$_SESSION["user_id"];
                $order_id= $_SESSION["order_id"];
                $con->query("INSERT INTO orderhistory (clo_id,cus_id,quantity,admindec) VALUES ('$order_id','$user_id','$quantity','Pending')");
               
              
                ?>
                <script>
                    document.getElementById("success").style.display="block";
                </script>
                <?php
               
            }catch(mysqli_sql_exception){ ?>
             <script>
                    document.getElementById("unsuccess").style.display="block";
                </script>
            <?php
                
            }
          }
            
        }
            
        }
    }} ?>
</body>
</html>