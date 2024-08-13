<?php 
include("../function/connection.php");
session_start(); 
include("../function/functions.php")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--     
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/home1.css">
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" href="../css/home3.css">
    <link rel="stylesheet" href="../css/home4.css"> -->

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">
    <!-- alpine -->
    <script src="../../public/script.js"></script>

    <link href="../css/card.css" rel="stylesheet">




</head>

<body>



    <nav x-data="{ isOpen: false }" class=" bg-white shadow sticky">
        <div class="container px-6 py-4 mx-auto">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <a href="./home.php">
                        <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                    </a>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-500  hover:text-gray-600  focus:outline-none focus:text-gray-600 "
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white  lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">

                    <div class="relative mt-4  md:mt-0 ">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <form action="../components/search.php" method="get">
                            <input type="text" 
                            name='val'
                                class="w-full lg:w-96 py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-lg  focus:border-blue-400  focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300"
                                placeholder="Search">
                        </form>
                    </div>

                    <div class="flex flex-col -mx-6 lg:flex-row lg:items-center lg:mx-8">
                        <a href="./home.php"
                            class="px-3 py-2 mx-3 mt-2 text-gray-700 font-semibold transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">Home</a>
                        <a href="./Men.php"
                            class="px-3 py-2 mx-3 mt-2 text-gray-700 font-semibold transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">Men's
                            collections </a>
                        <a href="./Lady.php"
                            class="px-3 py-2 mx-3 mt-2 text-gray-700 font-semibold transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">lady's
                            collections</a>
                        <a href="../components/login.php"
                            class="px-3 py-2 mx-3 mt-2 text-primary font-semibold transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">Login</a>
                        <a href="../components/signup.php"
                            class="px-3 py-2 mx-3 mt-2 text-gray-700 font-semibold  transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">Sign
                            up</a>
                    </div>

                    <div class="flex items-center mt-4 lg:mt-0">
                        <div class=''>
                            <button type="button" class="flex items-center focus:outline-none"
                                aria-label="toggle profile dropdown">
                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        class="object-cover w-full h-full" alt="avatar">
                                </div>

                                <h3 class="mx-2 text-gray-700 lg:hidden">Khatab wedaa</h3>
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </nav>

    <div class="account" id="accountcontent">
        <button id="closebtn"> &times;</button>

        <?php

ob_start();
 if(!empty($_SESSION["user_id"])){
$user_id=$_SESSION["user_id"];
$result=$con->query("SELECT * FROM customers  WHERE cus_id='$user_id'");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){?>
        <img src="data:image/jepg;base64,<?php echo base64_encode($row["per_img"]) ?>" alt=""
            style="max-height:200px;max-width:250px;border-radius:50%;">
        <form action="./home.php" method="get">

            <label for=""> <input type="text" value="<?php echo $row["cus_id"] ?>" name="user_id"
                    style="display:none;"></label><br>

            <label for=""> <input type="text" value="<?php echo $row["user_name"] ?>" name="user_name"
                    style="border:none;font-size:large;"> <br>Tap to change the username </label><br>
            <hr>
            <label for=""> <input type="text" value="<?php echo $row["address"] ?>" name="address"
                    style="border:none; font-size:large;"> <br> Tap to change the address </label><br>
            <hr>
            <label for=""> <input type="text" value="<?php echo $row["ph_no"] ?>" name="connum"
                    style="border:none; font-size:large;"> <br>Tap to change the contact number </label><br>
            <hr>
            <input type="submit" style="width:30%;" id="save" value="Save" name="save">
            <a href="../components/edit.php" id="edit"
                style=" width:40%;background-color: rgb(63, 202, 63);color:white;font-size:20px;padding:10px;text-decoration:none;font-weight:bold;border-radius:10px;">
                Edit profile </a>

        </form>
        <form action="../components/logout.php" method="post">
            <input id="logout"
                style=" width:70%; margin-top:20px;background-color: rgba(55, 120, 232, 0.885);color:white;font-size:20px;padding:10px;text-decoration:none;font-weight:bold;border-radius:10px;border:none;"
                type="submit" value="Logout" name="Logout">
        </form>



        <?php     

 if(isset($_GET["save"])){
    
    $user_id=$_GET["user_id"];
    $user_name=$_GET["user_name"];
    $address=$_GET["address"];
    $ph_no=$_GET["connum"];
     try{            
         $con->query("UPDATE customers SET user_name='$user_name', address='$address' , ph_no='$ph_no' WHERE cus_id='$user_id'");
header("Location:./home.php");
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
            <tr style="background-color:white;font-weight:bold;">


                <td style="padding: 0px;margin:0px"> <img
                        src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt=""
                        style="height:50px;width:70px;">
                </td>
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["type"] ?></td>
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["size"] ?></td>
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["price"] ?></td>
                <td style="width:5%;padding:8px; border-radius:8px ;"><?php echo $row["quantity"] ?></td>
                <?php
                switch($row["admindec"]){ 
                    case"Pending":?><td
                    style="width:5%;padding:8px; border-radius:8px ;background-color: rgba(55, 120, 232, 0.885);color:white;">
                    <?php echo $row["admindec"] ?></td><?php ;break; 
                    case"Accept":?><td
                    style="width:5%;padding:8px; border-radius:8px ; background-color: rgb(63, 202, 63);color:white;">
                    <?php echo $row["admindec"] ?></td><?php ;break;
                    case"Cancel":?><td
                    style="width:5%;padding:8px; border-radius:8px ; background-color: rgb(228, 77, 77);color:white;">
                    <?php echo $row["admindec"] ?></td><?php ;break;   
                }

                 
                ?>
                <td style="width:10%;padding:8px; border-radius:8px ;"><?php echo $row["or_date"] ?></td>
                <td class="action" style="width:5%;padding:8px; border-radius:8px ;background-color:red;">
                    <form action="./home.php" method="get">
                        <input style="display:none;" type="text" name="orid" value="<?php echo $row["his_id"] ?>">
                        <input style="display:none;" type="text" name="cus_id" value="<?php echo $row["cus_id"] ?>">
                        <input style="display:none;" type="text" name="clo_id" value="<?php echo $row["clo_id"] ?>">
                        <input style="display:none;" type="text" name="quantity" value="<?php echo $row["quantity"] ?>">
                        <input style="display:none;" type="text" name="instock" value="<?php echo $row["instock"] ?>">

                        <input style="border:none;font-size:15px;font-weight:bold;color:white;background-color:red;"
                            type="submit" name="cancel" value="Cancel">
                    </form>
                </td>
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
               header("Location:./home.php");
               ob_end_flush();
                   
            }catch(mysqli_sql_exception){
                echo"Fail to Delete";
            }
        }
        ?>
        </table>

    </div>

    <div class="heading">
        <div class="bg-red-500 border border-red-500" style="margin-right: 10px;">Make Yourself Gorgeous And Obvious
        </div>
        <div class="searchbar">
            <form action="../components/search.php" method="get">
                <input type="text" name="val" placeholder="Type of clothes">
                <input type="submit" value="Search" name="search">
            </form>
        </div>
        <div class="options">



            <button id="orhisbtn">Manage Orders</button>
            <button id="login" class="loginbtn"><a href="../components/login.php">Login</a></button>
            <button id="Sign Up" id="searchbtn"><a href="../components/signup.php">Sign Up</a></button>
            <button id="account">My Account</button>
        </div>
    </div>

    <div class="categories">
        <a href="./home.php">
            <div class="cat">All</div>
        </a>
        <a href="./Men.php">
            <div class="cat">Men's Collections</div>
        </a>
        <a href="./Lady.php">
            <div class="cat">Lady's Collections</div>
        </a>
    </div>




    <div id="all" class="container px-10 md:px-0 mx-auto " style="margin-top:40px;">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 ">
            <?php

   $result=$con->query("SELECT * FROM closet  order by price");
   if(!empty($result)&& $result->num_rows>0){
    while($row=$result->fetch_assoc()){ 
        
       ?>

            <div
                class="group my-10 flex w-full md:max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                    <img class="peer absolute top-0 right-0 h-full w-full object-cover"
                        src="data:image/jepg;base64,<?php echo base64_encode($row["image"]) ?>" alt="product image" />
                    <!-- <span class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39% OFF</span> -->
                </a>
                <div class="mt-4 px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl tracking-tight text-slate-900">Nike Air MX Super 2500 - Red</h5>
                    </a>
                    <div class="mt-2 mb-5 flex items-center justify-between">
                        <p>
                            <span class="text-2xl font-bold text-slate-800"><?php echo $row["price"] ?>KS</span>
                        </p>
                    </div>
                    <a href="../components/Detail.php?item_id=<?php  echo $row["clo_id"]; ?>"
                        class="flex items-center justify-center rounded-md bg-primary  px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg> -->
                        <svg class="mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                            width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                            <path fill="white"
                                d="M2 10a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v10a4 4 0 0 1-2.328 3.635a2.996 2.996 0 0 0-.55-.756l-8-8A3 3 0 0 0 14 17v7H6a4 4 0 0 1-4-4V10Zm14 19a1 1 0 0 0 1.8.6l2.7-3.6H25a1 1 0 0 0 .707-1.707l-8-8A1 1 0 0 0 16 17v12Z" />
                        </svg>
                        View Detail
                    </a>
                </div>
            </div>
            <?php

    }
   }
   
   ?>
        </div>
    </div>



</body>

</html>
<script src="../js/home.js"></script>
<script>
document.getElementById("account").addEventListener("click", () => {
    document.getElementById("accountcontent").style.width = "20%";

}, false);
</script>