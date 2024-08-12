<?php 
include("connection.php");
session_start(); 
include("functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="home3.css">
    <link rel="stylesheet" href="home4.css">

<style>
 .searchbar{
    width:auto;
 }
 .searchbar>form{
    width:auto;
 }
 .searchbar>form>input:nth-of-type(1){
    width:300px;
    border-radius: 10px;
    padding:5px 10px ;
    border:1px solid gray;
    
 }
 .searchbar>form>input:nth-of-type(2){
    padding:5px 5px;
   margin-left: 8px;
   border-radius: 7px;
   border:1px solid gray;

    
 }
 .searchbar>form>input:nth-of-type(2):hover{
    cursor: pointer;
    background-color: lightgray;
   
    
 }
 .formlog{
position: fixed;
top:30%;
left:38%;
z-index: 4;
display: block;
border:1px solid white;
padding:10px;
padding:10px 20px;
background-color: transparent;
backdrop-filter: blur(40px);
width:300px;
height:350px;
text-align: center;
border-radius: 20px;
} 

.categories{
    display: flex;
    flex-flow: row wrap;
    align-items: center;
    justify-content: space-evenly;
    z-index: 1;
    width:100%;
}
.categories >a{
    width:33%;
}

.categories .cat{
    position: relative;
    text-align: center;
    box-shadow: 5px 5px 13px black;
    border-radius: 10px;
    font-weight: bold;

}
.categories  .cat:hover{
    cursor:pointer;

}
.categories  .cat::before{
    content: '';
    position: absolute;
    top:0;
    left:0;
    width:0%;
    height:100%;
    background-color: darkcyan;
    transition: 0.5s;
    z-index: -1;
    border-radius: 10px;

}
.categories  .cat:hover:before{
width:100%;
transition: 0.5s;

}

.categories  .cat:focus{
    background-color: darkcyan;
    color:white;
}
.categories  .cat:hover{
    color:white;
}

#logout:hover{
cursor: pointer;
}
</style>
   
</head>
<body>

      
    
<div class="account" id="accountcontent">
<button id="closebtn"> &times;</button>





<div>
    
</div>
<?php

ob_start();
 if(!empty($_SESSION["user_id"])){
$user_id=$_SESSION["user_id"];
$result=$con->query("SELECT * FROM customers  WHERE cus_id='$user_id'");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){?>
 <img src="data:image/jepg;base64,<?php echo base64_encode($row["per_img"]) ?>" alt="" style="max-height:200px;max-width:250px;border-radius:50%;" >
        <form action="home.php" method="get">

     <label for=""> <input type="text" value="<?php echo $row["cus_id"] ?>" name="user_id" style="display:none;"></label><br>

    <label for=""> <input type="text" value="<?php echo $row["user_name"] ?>" name="user_name" style="border:none;font-size:large;"> <br>Tap to change the username </label><br>
    <hr>
    <label for=""> <input type="text" value="<?php echo $row["address"] ?>" name="address" style="border:none; font-size:large;"> <br> Tap to change the address </label><br>
    <hr>
    <label for=""> <input type="text" value="<?php echo $row["ph_no"] ?>" name="connum" style="border:none; font-size:large;">  <br>Tap to change the contact number </label><br>
    <hr>
    <input type="submit" style="width:30%;" id="save" value="Save" name="save"> 
    <a href="edit.php"  id="edit"style=" width:40%;background-color: rgb(63, 202, 63);color:white;font-size:20px;padding:10px;text-decoration:none;font-weight:bold;border-radius:10px;"> Edit profile </a>
    
    </form>
    <form action="logout.php" method="post">
        <input id="logout" style=" width:70%; margin-top:20px;background-color: rgba(55, 120, 232, 0.885);color:white;font-size:20px;padding:10px;text-decoration:none;font-weight:bold;border-radius:10px;border:none;"type="submit" value="Logout" name="Logout">
    </form> 


    
<?php     

 if(isset($_GET["save"])){
    
    $user_id=$_GET["user_id"];
    $user_name=$_GET["user_name"];
    $address=$_GET["address"];
    $ph_no=$_GET["connum"];
     try{            
         $con->query("UPDATE customers SET user_name='$user_name', address='$address' , ph_no='$ph_no' WHERE cus_id='$user_id'");
header("Location:home.php");
ob_end_flush();
        }catch(mysqli_sql_exception){
       

     }
 
 
}  

}}} 
else{
    echo " ";
}




?> 



</div>
<div id="orhis">
    <button id="orclobtn"> &times;</button> 
   <table>
    <tr style="background-color: darkcyan;">
        <th style="width:5%;padding:8px;border-radius:8px ;color:white;">Image</th>
        <th style="width:5%; padding:8px; border-radius:8px ;color:white;">Type</th>
        <th style="width:5%;padding:8px; border-radius:8px ;color:white;">Size</th>
        <th style="width:5%; padding:8px; border-radius:8px ;color:white;">Price</th>
        <th style="width:5%; padding:8px; border-radius:8px ;color:white;">Quantity</th>
        <th style="width:5%;padding:8px; border-radius:8px ;color:white;">Status</th>
        <th style="width:10%; padding:8px; border-radius:8px ;color:white;">Date&Time</th>
    </tr>
    <?php  
    if(!empty($_SESSION["user_id"])){
        $user_id=$_SESSION["user_id"];
       
        $result=$con->query("SELECT * FROM orderhistory JOIN closet ON closet.clo_id=orderhistory.clo_id JOIN customers ON customers.cus_id=orderhistory.cus_id WHERE orderhistory.cus_id='$user_id' ");
        if(!empty($result)&& $result->num_rows>0){
           while($row=$result->fetch_assoc()){ ?>
               <tr  style="background-color:white;font-weight:bold;">
                
                 
               <td style="padding: 0px;margin:0px"> <img  src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt="" style="height:50px;width:70px;" >
               </td>             
                  <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["type"] ?></td>
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["size"] ?></td>
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["price"] ?></td> 
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["quantity"] ?></td>  
                <?php
                switch($row["admindec"]){ 
                    case"Pending":?><td style="width:5%;padding:8px; border-radius:8px ;background-color: rgba(55, 120, 232, 0.885);color:white;"><?php echo $row["admindec"] ?></td><?php ;break; 
                    case"Accept":?><td style="width:5%;padding:8px; border-radius:8px ; background-color: rgb(63, 202, 63);color:white;"><?php echo $row["admindec"] ?></td><?php ;break;
                    case"Cancel":?><td style="width:5%;padding:8px; border-radius:8px ; background-color: rgb(228, 77, 77);color:white;"><?php echo $row["admindec"] ?></td><?php ;break;   
                }

                 
                ?>
                <td style="width:10%;padding:8px; border-radius:8px ;"><?php echo $row["or_date"] ?></td>  
                <td class="action" style="width:5%;padding:8px; border-radius:8px ;background-color:red;"><form  action="home.php" method="get">
                    <input style="display:none;" type="text" name="orid" value="<?php echo $row["his_id"] ?>">
                    <input style="display:none;" type="text" name="cus_id" value="<?php echo $row["cus_id"] ?>">
                    <input style="display:none;" type="text" name="clo_id" value="<?php echo $row["clo_id"] ?>">
                    <input style="display:none;" type="text" name="quantity" value="<?php echo $row["quantity"] ?>">
                    <input style="display:none;" type="text" name="instock" value="<?php echo $row["instock"] ?>">

                    <input  style="border:none;font-size:15px;font-weight:bold;color:white;background-color:red;" type="submit" name="cancel" value="Cancel"></form></td>
             </tr>
                  <?php
            }}}
            else{
                echo" ";
            }
        
        ?> 
        <?php
        if(isset($_GET["cancel"])){
            ob_start();
            $orid=$_GET["orid"];
            $user_id=$_GET["cus_id"];
            $clo_id=$_GET["clo_id"];
            $quantity=$_GET["quantity"];
            $instock=$_GET["instock"];
            $upinstock=$instock+$quantity;
            try{
                $con->query("DELETE FROM orderhistory WHERE his_id='$orid'");
                update($upinstock,$clo_id);
               header("Location:home.php");
               ob_end_flush();
                   
            }catch(mysqli_sql_exception){
                echo"Fail to Delete";
            }
        }
        ?>
   </table>

    </div>

<div class="heading" > 
<div class="logo" style="margin-right: 10px;">Make Yourself Gorgeous And Obvious </div> 
<div class="searchbar"><form action="search.php" method="get">
    <input type="text" name="val" placeholder="Type of clothe" ><input type="submit" value="Search" name="search">
</form></div>
<div class="options">



<button id="orhisbtn" >Manage Orders</button>
<button id="login" class="loginbtn"><a href="login.php">Login</a></button>
<button id="Sign Up" id="searchbtn" ><a href="signup.php">Sign Up</a></button>
<button id="account">My Account</button>
</div>
</div>

<div class="categories"  >
<a  href="home.php"><div class="cat">All</div></a>
<a  href="Men.php"> <div class="cat">Men's Collections</div></a>
<a href="Lady.php"><div class="cat">Lady's Collections</div></a>
</div>




    <div id="all" style="margin-top:40px;">
        <div class="container">
   <?php

   $result=$con->query("SELECT * FROM closet  order by price");
   if(!empty($result)&& $result->num_rows>0){
    while($row=$result->fetch_assoc()){ 
        
       ?>
<div class="item"><img src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt="" >
<div class="price"> <div class="div1"><?php echo $row["price"] ?>KS</div>
<a href="Detail.php?item_id=<?php  echo $row["clo_id"]; ?>"><div class="div2">View Detail</div></a>
</div>

</div>

    <?php

    }
   }
   
   ?> </div> </div>
    


</body>
</html>
<script src="home.js"></script>
<script>
     document.getElementById("account").addEventListener("click",()=>{
   document.getElementById("accountcontent").style.width="20%";
  
     },false);
</script>
