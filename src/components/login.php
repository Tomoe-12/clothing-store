<?php 
include("../function/connection.php");
session_start(); 
   
$key=true;
 $key2=true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<style>
    body{
        background-image: url(premium\ pic/vintagestyle.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }
    form{
        
         border: 1px solid white;
         display: flex;
         flex-flow: column wrap;
         align-content: center;
         justify-content: center;
         padding:10px 20px 40px 20px;
         height:auto;
         background-color:transparent;
         backdrop-filter: blur(60px);
border-radius: 20px;
border: 1px solid white;;
box-shadow: 5px 5px 13px black;
    }
    form>input{
        background-color: transparent;
        border:1px solid white;
        font-size: 15px;
        color:white;
        border-radius: 20px;
        padding:10px 20px;
    }
    form>input:nth-of-type(3){
        background-color: white;
        border: none;
        font-size: 17px;
        font-weight: bold;
        color:black;
        border-radius: 20px;
        padding:10px 20px;
    }
    form>input:nth-of-type(3):hover{
        cursor: pointer;
    } 
    ::-webkit-input-placeholder{
        color:white;
        font-size: 15px;
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
        #success ,#unsuccess{
            display: none;
        }
</style>
   
</head>
<body>
<a href="../pages/home.php">Back</a>
<form  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" id="form" class="formlog" method="post">
    <h1 style="color:black;font-size:35px; text-align:center;margin-top:0px;">Login </h1>
    <input type="email" name="email" placeholder="E-mail" required><br>
    <input type="password" name="pass" placeholder="Password" maxlength="10" required><br>
    <input  type="submit" name="Login" value="Login">
    <div id="success" style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:green;border-radius:10px;">Login Successfully</div>
    <div id="unsuccess" style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:red;border-radius:10px;">Login Fail! Please Sign Up first!</div>
</form>
<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
$pass=filter_input(INPUT_POST,"pass",FILTER_SANITIZE_SPECIAL_CHARS);

if($email=="admin@gmail.com" && $pass =="admin123"){
    header("Location:itemlist.php");
} 
else{  
     $result=$con->query("SELECT * FROM customers");
     if(!empty($result)&& $result->num_rows>0){
        while($row=$result->fetch_assoc()){
             if($row["email"]==$email && password_verify($pass,$row["pass"])){
                $_SESSION["user_id"]=$row["cus_id"];
                $key=false; 
                  ?>
                   <script>
                    document.getElementById("success").style.display="block";
                </script> 
                  <?php
                
             }  

         }
        
        
        
        }
         if($key){ ?>
          <script>
                    document.getElementById("unsuccess").style.display="block";
                </script> 
      
      <?php  } 

      
          
     
}   
}

?> 
</body>
</html>