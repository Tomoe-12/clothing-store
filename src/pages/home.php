<?php 
include("../function/connection.php");
session_start(); 
include("../function/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>


    <!-- <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/home1.css">
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" href="../css/home3.css">
    <link rel="stylesheet" href="../css/home4.css"> -->

    <!-- flowbite -->
    <link rel="stylesheet" href="../../node_modules/flowbite/dist/flowbite.min.css">
    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">
    <!-- alpine -->
    <script src="../../public/script.js"></script>


    <style>
    .test {
        border: 1px solid red;
    }

    nav {
        z-index: 999 !important;
    }

    #drawer-right-example {
        z-index: 99 !important;
    }

    nav:not(.scrolled) {
        box-shadow: none;
    }

    nav.scrolled {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    </style>

    <script>
    if ( <?Php echo $_SESSION["success"] ?> ) {

        alert("Logged in Successfully!");
        <?php $_SESSION["success"]=null; ?>
    }
    </script>
</head>

<body>


    <nav x-data="{ isOpen: false }" class="w-full  bg-white fixed top-0">
        <div class="container px-6 py-4 mx-auto">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <a href="./home.php">
                        <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                    </a>


                    <!-- Mobile menu button -->

                    <div class="flex lg:hidden gap-5">
                        <div class="flex justify-center md:block">
                            <?php if(!empty($_SESSION['user_id'])){
                            $count=cartnoti($_SESSION["user_id"]); ?>
                            <a class="relative text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-300"
                                href="./Cart.php">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.70711 15.2929C4.07714 15.9229 4.52331 17 5.41421 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM9 19C9 20.1046 8.10457 21 7 21C5.89543 21 5 20.1046 5 19C5 17.8954 5.89543 17 7 17C8.10457 17 9 17.8954 9 19Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <?php  if($count!=0){ ?>
                                <span
                                    class="absolute flex justify-center items-center w-5 h-5 p-0.5 text-center text-white bg-blue-500 rounded-full"
                                    style="font-size : 11px; top :-30%; right : -40%;"><?php  echo $count?>
                                </span>
                                <?php }?>
                            </a>
                            <?php } ?>
                        </div>


                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-500  hover:text-gray-600  focus:outline-none focus:text-gray-600 "
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 shadow-md' : 'opacity-0 -translate-x-full']"
                    class="absolute   inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white  lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">

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
                            <input type="text" name='val'
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

                        <?php if(!empty($_SESSION['user_id'])){
                         $count=cartnoti($_SESSION["user_id"]); ?>
                        <div class="lg:flex justify-center hidden">
                            <a class="relative text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-300"
                                href="./Cart.php">
                                <svg class="w-6 h-6 viewBox=" 0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.70711 15.2929C4.07714 15.9229 4.52331 17 5.41421 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM9 19C9 20.1046 8.10457 21 7 21C5.89543 21 5 20.1046 5 19C5 17.8954 5.89543 17 7 17C8.10457 17 9 17.8954 9 19Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <?php  if($count != 0){ ?>
                                <span
                                    class="absolute flex justify-center items-center w-5 h-5 p-0.5 text-center text-white bg-blue-500 rounded-full"
                                    style="font-size : 11px; top :-30%; right : -40%;"><?php  echo $count?>
                                </span>
                                <?php }?>

                            </a>
                        </div>
                        <?php } ?>


                        <?php
                            
                             if(empty($_SESSION["user_id"])){ ?>
                        <a href="../components/login.php"
                            class="px-3 py-2 mx-3 mt-2 text-primary font-semibold transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">Login</a>
                        <a href="../components/signup.php"
                            class="px-3 py-2 mx-3 mt-2 text-gray-700 font-semibold  transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">Sign
                            up</a>


                        <?php    }
                            
                            ?>
                    </div>

                    <?php  
                 
                  if(isset($_SESSION["user_id"])){
                    $user_id=$_SESSION["user_id"];
                 if(profileimgvalidate($user_id)) {

                    
$result=$con->query("SELECT * FROM customers  WHERE cus_id=$user_id");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){?>
                    <div class="flex items-center mt-4 lg:mt-0">
                        <div class=''>
                            <button onclick="location.href='./profile.php'" type="button"
                                class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                    <img src="data:image/jepg;base64,<?php echo base64_encode($row["per_img"]) ?>"
                                        class="object-cover w-full h-full" alt="avatar">
                                </div>

                                <h3 class="mx-2 text-gray-700 lg:hidden">Khatab wedaa</h3>
                            </button>
                        </div>
                    </div>

                    <?php   }}} 
                 else{ ?>
                    <div class="flex items-center mt-4 lg:mt-0">
                        <div class=''>
                            <button type="button" class="flex items-center focus:outline-none"
                                onclick="location.href='./profile.php'" aria-label="toggle profile dropdown">
                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        class="object-cover w-full h-full" alt="avatar">
                                </div>

                                <h3 class="mx-2 text-gray-700 lg:hidden">Khatab wedaa</h3>
                            </button>
                        </div>
                    </div>

                    <?php   } }?>


                </div>


            </div>
        </div>
    </nav>
    <div id="all" class="container px-6 md:px-0 mx-auto " style="margin-top:80px;">

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
                        src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>"
                        alt="product image" />
                    <!-- <span class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39% OFF</span> -->
                </a>
                <div class="mt-4 px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl tracking-tight text-slate-900"><?php echo $row["productname"] ?></h5>
                    </a>
                    <div class="mt-2 mb-5 flex items-center justify-between">
                        <p>
                            <span class="text-2xl font-bold text-slate-800"><?php echo $row["price"] ?>KS</span>
                        </p>
                    </div>
                    <div class='mb-5 flex gap-2'>
                        <?php 
                        $colors = json_decode($row['color']);
                        foreach ($colors as $color) { ?>
                        <div 
                            style='width: 20px; height: 20px; border-radius:50%; background-color:<?php echo $color;?>'>
                        </div>
                        <?php }?>
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
const nav = document.querySelector('nav');

window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});
document.getElementById("account").addEventListener("click", () => {
    document.getElementById("accountcontent").style.width = "20%";

}, false);
</script>