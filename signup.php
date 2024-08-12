<?php 
include("connection.php");
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
            background-image: url(premium\ pic/vintagestyle.jpg);
            background-repeat: no-repeat;
            background-size: cover; 
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh; 
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
            border-radius: 5px;
        }
        .signupbox{

            box-shadow: 6px 6px 6px  5px black;
            width:300px;
            height:650px;
            padding:0px 20px 20px 20px;
            border-radius: 10px;
            background-color: transparent;
            backdrop-filter: blur(70px);

        }
        .signupbox> form{
           
           display: flex;
           flex-flow: column wrap;
          justify-content: space-evenly;
          align-items: center;
          width:100%;
          height: 100%;
         font-size: 20px;
         font-weight: bold;
         
         
       }
       .signupbox>form >input{
        width:80%;
        background-color: transparent;
        padding:8px 20px;
        border-radius: 20px;
        margin-bottom: 20px;
        border: 1px solid white;
        height:37px;
       font-size: 15px;
       
       }
 ::-webkit-input-placeholder{
        color:white;
       }
       .signupbox>form >input:nth-of-type(7){
        background-color: white;
        color:black;
        font-size: 17px;
        text-align: center;
        width:80%;
        padding:0px;
        font-weight: bold;
       height:45px;
        
       }
       .signupbox>form >input:nth-of-type(7):hover{
        cursor: pointer;

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
        #pass{
            font-size: 16px;
            font-weight: bold;
            display: none;
        } 
        #complete{
            font-size: 16px;
            font-weight: bold;
            display: none;
        }
    </style>
</head>
<body>
<a href="home.php">Back</a>
<div class="signupbox">

<form  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
<h1>Sign Up</h1>
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
<div id="complete" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;"> Please fill the form completely!</div>

</form>
</div>
</body>
</html>
<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
   $repass=$_POST["repass"];
   $ph_no=$_POST["ph_no"];
   $address=$_POST["address"];
    if($pass==$repass) {
        $result=$con->query("SELECT * FROM customers");
        if(!empty($result)&& $result->num_rows>0){
           while($row=$result->fetch_assoc()){
                if($row["email"]==$email && password_verify($pass,$row["pass"])){
                   $key=true;
                   ?>     
                <script>
                    document.getElementById("unsuccess").style.display="block";
                </script>             
                <?php
                   
                }  
   
            } 
            if(!$key){ 
                try{
                  $hash=password_hash($pass,PASSWORD_DEFAULT)  ;
                $con->query("INSERT INTO customers (user_name,email,pass,ph_no,address) VALUES ('$username','$email','$hash','$ph_no','$address')");
            
               ?> 
               <script>
                    document.getElementById("success").style.display="block";
                </script> 
                <?php
            }catch(mysqli_sql_exception){
                echo"sign up fail";
            }
            } 
           
           
      
    }
}
     else{ ?>
        <script>document.getElementById("pass").style.display="block"</script>

       <?php
        $key=true;
         
    } 

} 



    

    
    ?> 


