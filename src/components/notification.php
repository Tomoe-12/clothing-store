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
    <title>Notification</title>
</head>

<!-- flowbite -->
<link rel="stylesheet" href="../../node_modules/flowbite/dist/flowbite.min.css">
<script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

<!-- tailwind -->
<link href="../output.css" rel="stylesheet">
<!-- alpine -->
<script src="../../public/script.js"></script>

<style>
nav {
    z-index: 999 !important;
}

nav:not(.scrolled) {
    box-shadow: none;
}

nav.scrolled {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.test {
    border: 1px solid red;
}
</style>

<body>
    <nav x-data="{ isOpen: false }" class="w-full bg-white fixed top-0">
        <div class="container px-6 py-4 mx-auto">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <a href="./home.php">
                        <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                    </a>
                    <!-- Mobile menu button -->

                    <div class="flex lg:hidden gap-5">
                        <div class="flex fle-col items-center justify-center gap-5">
                            <?php if(!empty($_SESSION['user_id'])){
                            $count=cartnoti($_SESSION["user_id"]); ?>
                            <a class="relative text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-300"
                                href="../components/notification.php">
                                <svg class='w-8 h-8' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M17.7778 16.4066C18.1725 16.2808 18.3904 15.8588 18.2646 15.4642C18.1388 15.0696 17.7168 14.8516 17.3222 14.9774L17.7778 16.4066ZM11.6797 15.9343C11.2657 15.9455 10.9391 16.2902 10.9503 16.7043C10.9615 17.1183 11.3062 17.4449 11.7203 17.4337L11.6797 15.9343ZM16.876 16.0131C17.0578 16.3853 17.5068 16.5397 17.8791 16.358C18.2513 16.1762 18.4057 15.7272 18.224 15.3549L16.876 16.0131ZM16.9104 14.374L16.2225 14.6728C16.2269 14.683 16.2316 14.6931 16.2364 14.7031L16.9104 14.374ZM15.9422 10.806L16.6868 10.7157C16.6855 10.7048 16.6839 10.694 16.6821 10.6832L15.9422 10.806ZM11.7068 5.941C11.2926 5.941 10.9568 6.27679 10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441V5.941ZM11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691C12.4568 6.27679 12.121 5.941 11.7068 5.941V7.441ZM7.45778 10.807L6.71795 10.6839C6.71614 10.6948 6.71457 10.7057 6.71325 10.7166L7.45778 10.807ZM6.48961 14.374L7.16357 14.7031C7.16843 14.6931 7.17308 14.683 7.1775 14.6728L6.48961 14.374ZM5.17605 15.3549C4.99431 15.7272 5.14873 16.1762 5.52095 16.358C5.89317 16.5397 6.34223 16.3853 6.52397 16.0131L5.17605 15.3549ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM6.07781 14.9774C5.68317 14.8516 5.26125 15.0696 5.13544 15.4642C5.00963 15.8588 5.22756 16.2808 5.6222 16.4066L6.07781 14.9774ZM11.6797 17.4337C12.0938 17.4449 12.4385 17.1183 12.4497 16.7043C12.4609 16.2902 12.1343 15.9455 11.7203 15.9343L11.6797 17.4337ZM10.5 16.523C10.5 16.1088 10.1642 15.773 9.75001 15.773C9.33579 15.773 9.00001 16.1088 9.00001 16.523H10.5ZM14.4049 16.523C14.4049 16.1088 14.0691 15.773 13.6549 15.773C13.2407 15.773 12.9049 16.1088 12.9049 16.523H14.4049ZM17.3222 14.9774C15.4929 15.5606 13.5943 15.8825 11.6797 15.9343L11.7203 17.4337C13.7761 17.3782 15.8144 17.0325 17.7778 16.4066L17.3222 14.9774ZM18.224 15.3549L17.5844 14.0449L16.2364 14.7031L16.876 16.0131L18.224 15.3549ZM17.5983 14.0752C17.1347 13.008 16.8275 11.8759 16.6868 10.7157L15.1977 10.8963C15.3558 12.1997 15.701 13.4723 16.2225 14.6728L17.5983 14.0752ZM16.6821 10.6832C16.4696 9.40313 16.017 8.21501 15.1948 7.33897C14.3526 6.44171 13.1869 5.941 11.7068 5.941V7.441C12.8193 7.441 13.5729 7.80279 14.1011 8.36553C14.6492 8.94949 15.0181 9.81887 15.2024 10.9288L16.6821 10.6832ZM11.7068 5.941C10.2266 5.941 9.05835 6.44146 8.21321 7.33789C7.38755 8.21366 6.93123 9.40201 6.71795 10.6839L8.19761 10.9301C8.38214 9.82099 8.75359 8.95134 9.30463 8.36686C9.83619 7.80304 10.5936 7.441 11.7068 7.441V5.941ZM6.71325 10.7166C6.57244 11.8765 6.26519 13.0083 5.80171 14.0752L7.1775 14.6728C7.69888 13.4727 8.04413 12.2004 8.20232 10.8974L6.71325 10.7166ZM5.81565 14.0449L5.17605 15.3549L6.52397 16.0131L7.16357 14.7031L5.81565 14.0449ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM5.6222 16.4066C7.58558 17.0325 9.62394 17.3782 11.6797 17.4337L11.7203 15.9343C9.80576 15.8825 7.90713 15.5606 6.07781 14.9774L5.6222 16.4066ZM9.00001 16.523V17.023H10.5V16.523H9.00001ZM9.00001 17.023C9.00001 18.5252 10.1921 19.7755 11.7024 19.7755V18.2755C11.0561 18.2755 10.5 17.7327 10.5 17.023H9.00001ZM11.7024 19.7755C13.2127 19.7755 14.4049 18.5252 14.4049 17.023H12.9049C12.9049 17.7327 12.3487 18.2755 11.7024 18.2755V19.7755ZM14.4049 17.023V16.523H12.9049V17.023H14.4049Z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>

                                <?php  if($count!=0){ ?>
                                <span
                                    class="absolute flex justify-center items-center w-5 h-5 p-0.5 text-center text-white bg-blue-500 rounded-full"
                                    style="font-size : 11px; top :-30%; right : -40%;"><?php  echo $count?>
                                </span>
                                <?php }?>
                            </a>
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
                    class="absolute  inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white  lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">

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
                        </a>
                        <a href="./Lady.php"
                            class="px-3 py-2 mx-3 mt-2 text-gray-700 font-semibold transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-100 ">lady's
                        </a>

                        <?php if(!empty($_SESSION['user_id'])){
                         $count=cartnoti($_SESSION["user_id"]); ?>
                        <div class="lg:flex justify-center hidden gap-5 ">
                            <a class="relative text-gray-700 transition-colors duration-300 transform dark:text-gray-200"
                                href="../components/notification.php">
                                <svg class='w-7 h-7' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M17.7778 16.4066C18.1725 16.2808 18.3904 15.8588 18.2646 15.4642C18.1388 15.0696 17.7168 14.8516 17.3222 14.9774L17.7778 16.4066ZM11.6797 15.9343C11.2657 15.9455 10.9391 16.2902 10.9503 16.7043C10.9615 17.1183 11.3062 17.4449 11.7203 17.4337L11.6797 15.9343ZM16.876 16.0131C17.0578 16.3853 17.5068 16.5397 17.8791 16.358C18.2513 16.1762 18.4057 15.7272 18.224 15.3549L16.876 16.0131ZM16.9104 14.374L16.2225 14.6728C16.2269 14.683 16.2316 14.6931 16.2364 14.7031L16.9104 14.374ZM15.9422 10.806L16.6868 10.7157C16.6855 10.7048 16.6839 10.694 16.6821 10.6832L15.9422 10.806ZM11.7068 5.941C11.2926 5.941 10.9568 6.27679 10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441V5.941ZM11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691C12.4568 6.27679 12.121 5.941 11.7068 5.941V7.441ZM7.45778 10.807L6.71795 10.6839C6.71614 10.6948 6.71457 10.7057 6.71325 10.7166L7.45778 10.807ZM6.48961 14.374L7.16357 14.7031C7.16843 14.6931 7.17308 14.683 7.1775 14.6728L6.48961 14.374ZM5.17605 15.3549C4.99431 15.7272 5.14873 16.1762 5.52095 16.358C5.89317 16.5397 6.34223 16.3853 6.52397 16.0131L5.17605 15.3549ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM10.9568 6.691C10.9568 7.10521 11.2926 7.441 11.7068 7.441C12.121 7.441 12.4568 7.10521 12.4568 6.691H10.9568ZM12.4568 5C12.4568 4.58579 12.121 4.25 11.7068 4.25C11.2926 4.25 10.9568 4.58579 10.9568 5H12.4568ZM6.07781 14.9774C5.68317 14.8516 5.26125 15.0696 5.13544 15.4642C5.00963 15.8588 5.22756 16.2808 5.6222 16.4066L6.07781 14.9774ZM11.6797 17.4337C12.0938 17.4449 12.4385 17.1183 12.4497 16.7043C12.4609 16.2902 12.1343 15.9455 11.7203 15.9343L11.6797 17.4337ZM10.5 16.523C10.5 16.1088 10.1642 15.773 9.75001 15.773C9.33579 15.773 9.00001 16.1088 9.00001 16.523H10.5ZM14.4049 16.523C14.4049 16.1088 14.0691 15.773 13.6549 15.773C13.2407 15.773 12.9049 16.1088 12.9049 16.523H14.4049ZM17.3222 14.9774C15.4929 15.5606 13.5943 15.8825 11.6797 15.9343L11.7203 17.4337C13.7761 17.3782 15.8144 17.0325 17.7778 16.4066L17.3222 14.9774ZM18.224 15.3549L17.5844 14.0449L16.2364 14.7031L16.876 16.0131L18.224 15.3549ZM17.5983 14.0752C17.1347 13.008 16.8275 11.8759 16.6868 10.7157L15.1977 10.8963C15.3558 12.1997 15.701 13.4723 16.2225 14.6728L17.5983 14.0752ZM16.6821 10.6832C16.4696 9.40313 16.017 8.21501 15.1948 7.33897C14.3526 6.44171 13.1869 5.941 11.7068 5.941V7.441C12.8193 7.441 13.5729 7.80279 14.1011 8.36553C14.6492 8.94949 15.0181 9.81887 15.2024 10.9288L16.6821 10.6832ZM11.7068 5.941C10.2266 5.941 9.05835 6.44146 8.21321 7.33789C7.38755 8.21366 6.93123 9.40201 6.71795 10.6839L8.19761 10.9301C8.38214 9.82099 8.75359 8.95134 9.30463 8.36686C9.83619 7.80304 10.5936 7.441 11.7068 7.441V5.941ZM6.71325 10.7166C6.57244 11.8765 6.26519 13.0083 5.80171 14.0752L7.1775 14.6728C7.69888 13.4727 8.04413 12.2004 8.20232 10.8974L6.71325 10.7166ZM5.81565 14.0449L5.17605 15.3549L6.52397 16.0131L7.16357 14.7031L5.81565 14.0449ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM12.4568 6.691V5H10.9568V6.691H12.4568ZM5.6222 16.4066C7.58558 17.0325 9.62394 17.3782 11.6797 17.4337L11.7203 15.9343C9.80576 15.8825 7.90713 15.5606 6.07781 14.9774L5.6222 16.4066ZM9.00001 16.523V17.023H10.5V16.523H9.00001ZM9.00001 17.023C9.00001 18.5252 10.1921 19.7755 11.7024 19.7755V18.2755C11.0561 18.2755 10.5 17.7327 10.5 17.023H9.00001ZM11.7024 19.7755C13.2127 19.7755 14.4049 18.5252 14.4049 17.023H12.9049C12.9049 17.7327 12.3487 18.2755 11.7024 18.2755V19.7755ZM14.4049 17.023V16.523H12.9049V17.023H14.4049Z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>
                            </a>
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
                    <div class="flex items-center lg:mt-0">
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

    <section style='margin-bottom:64px; margin-top:64px; '
        class='h-fit gap-10 flex flex-col items-center justify-between ' >
       
        <!-- loop here to show each order  -->
        <div
            class="mt-10 container w-full mx-auto max-w-screen-xl">

            <div class='rounded-xl bg-gray-100 w-fit relative px-4 py-8 sm:px-6 sm:py-12 lg:px-8'>
                <div class='w-full h-fit flex justify-between items-center'>
                    <!--  this is for accept state -->
                    <div style='color:#24AE7C ; border :1px solid #24AE7C ;'
                        class='w-fit flex justify-center items-center gap-1 rounded-full px-2 py-1.5'>
                        <svg class='w-4 h-4' viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 3L4.5 8.5L2 6" stroke="#24AE7C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class='text-base max-sm:text-base font-medium'>Accept</p>
                    </div>

                    <!-- this is for the pending state   -->
                    <!-- 
                    <div
                        class='text-primary border border-primary w-fit flex justify-center items-center gap-1 rounded-full px-2 py-1.5'>
                        <svg class="w-6 h-6" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M459.8 305.8c11 0 20 9 20 20v15c0 11-9 20-20 20H294.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h165.6zM347.5 458.6c11 0 20 9 20 20v15c0 11-9 20-20 20h-53.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h53.2zM347.5 617.7c11 0 20 9 20 20v15c0 11-9 20-20 20h-53.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h53.2z"
                                fill="currentColor" />
                            <path
                                d="M579.1 345c-116.9 0-211.6 94.7-211.6 211.6 0 116.9 94.7 211.6 211.6 211.6 116.9 0 211.6-94.7 211.6-211.6C790.8 439.7 696 345 579.1 345z m0 369.6c-87.3 0-158-70.8-158-158 0-87.3 70.8-158 158-158s158 70.8 158 158c0.1 87.3-70.7 158-158 158z"
                                fill="currentColor" />
                            <path
                                d="M913.7 875.7c7.8 7.8 7.8 20.5 0 28.3l-10.1 10.1c-7.8 7.8-20.5 7.8-28.3 0L697.7 736.6c-7.8-7.8-7.8-20.5 0-28.3l10.1-10.1c7.8-7.8 20.5-7.8 28.3 0l177.6 177.5z"
                                fill="currentColor" />
                            <path
                                d="M750.7 827.3c-7.8-7.8-14.1-5.1-14.1 5.9V858c0 11-9 20-20 20l-475.8-0.5c-11 0-20-9-20-20V171.9c0-11 9-20 20-20h369.1c11 0 20 9 20 20v68.5c0 11 9 20 20 20h66.7c11 0 20 9 20 20v88.3c0 11 5.6 27.1 12.4 35.7l32 52.3c4.7 10 8.5 9.1 8.5-1.9l0.1-204.7c0-11-6.3-26.4-14.1-34.2L673 113.1c-7.8-7.8-23.1-14.2-34.1-14.2H190.1c-11 0-20 9-20 20v789.4c0 11 9 20 20 20h579.1c11 0 20-9 20-20v-22.5c0-11-6.4-26.4-14.1-34.1l-24.4-24.4z"
                                fill="currentColor" />
                        </svg>
                        <p class='text-base max-sm:text-base font-medium'>Pending</p>
                    </div>-->
                    <div>
                        <p class='text-sm max-sm:text-base font-medium'>Order Date : <span
                                class='ml-auto font-bold'>2004-12-22</span></p>
                    </div>

                </div>
                <!-- loop here to show the image   -->
                <ul class="mt-5 flex gap-4 flex-wrap ">
                    <li class='bg-white h-fit px-4 pb-5 pt-4 rounded-lg' style=' min-width:350px; max-width:350px;'>
                        <div class="cursor-pointer group block overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                alt="" style='min-height:370px; max-height:370px ; min-width:350px; max-width:350px;'
                                class="rounded-md w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                            <div class="relative pt-3">
                                <h3
                                    class="text-base font-semibold text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <div class="color mt-2 flex items-center gap-3 ">
                                    <div style='width: 17px; height: 17px; border-radius:50%; background-color:red'>
                                    </div>
                                    <p>Medium</p>
                                </div>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>
                                    <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                </p>
                            </div>
                        </div>
                    </li>
                  
                </ul>
                <!-- order summary -->
                 <!-- if one item uses justify-center , if more than one item use justify-end -->
                <header class='flex mt-5 justify-center justify-end gap-10'>
                    <ul class=" text-gray-800 space-y-3 " style='min-width:250px;max-width:250px;'>
                        <?php if(isset($subtotal)){?>
                        <li class="flex flex-wrap gap-4 text-base">Subtotal <span class="ml-auto font-bold">KS</span>
                        </li> <?php } else{?>
                        <li class="flex flex-wrap gap-4 text-base">Subtotal <span class="ml-auto font-bold">KS</span>
                        </li> <?php }?>
                        <li class="flex flex-wrap gap-4 text-base">Shipping <span class="ml-auto font-bold">
                                30000000000000 KS
                            </span>
                        </li>
                        <li class="flex flex-wrap gap-4 text-base">Tax <span class="ml-auto font-bold">
                                KS
                            </span></li>
                        <hr class="border-gray-300" />
                        <li class="flex flex-wrap gap-4 text-base font-bold">Total <span class="ml-auto">KS</span>
                        </li>
                    </ul>

                </header>
            </div>
        </div>

        <div
            class=" container w-full mx-auto max-w-screen-xl ">

            <div class='rounded-xl bg-gray-100 w-fit relative px-4 py-8 sm:px-6 sm:py-12 lg:px-8'>
                <div class='w-full h-fit flex justify-between items-center'>
                    <!--  this is for accept state -->
                    <div style='color:#24AE7C ; border :1px solid #24AE7C ;'
                        class='w-fit flex justify-center items-center gap-1 rounded-full px-2 py-1.5'>
                        <svg class='w-4 h-4' viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 3L4.5 8.5L2 6" stroke="#24AE7C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class='text-base max-sm:text-base font-medium'>Accept</p>
                    </div>

                    <!-- this is for the pending state   -->
                    <!-- 
                    <div
                        class='text-primary border border-primary w-fit flex justify-center items-center gap-1 rounded-full px-2 py-1.5'>
                        <svg class="w-6 h-6" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M459.8 305.8c11 0 20 9 20 20v15c0 11-9 20-20 20H294.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h165.6zM347.5 458.6c11 0 20 9 20 20v15c0 11-9 20-20 20h-53.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h53.2zM347.5 617.7c11 0 20 9 20 20v15c0 11-9 20-20 20h-53.2c-11 0-20-9-20-20v-15c0-11 9-20 20-20h53.2z"
                                fill="currentColor" />
                            <path
                                d="M579.1 345c-116.9 0-211.6 94.7-211.6 211.6 0 116.9 94.7 211.6 211.6 211.6 116.9 0 211.6-94.7 211.6-211.6C790.8 439.7 696 345 579.1 345z m0 369.6c-87.3 0-158-70.8-158-158 0-87.3 70.8-158 158-158s158 70.8 158 158c0.1 87.3-70.7 158-158 158z"
                                fill="currentColor" />
                            <path
                                d="M913.7 875.7c7.8 7.8 7.8 20.5 0 28.3l-10.1 10.1c-7.8 7.8-20.5 7.8-28.3 0L697.7 736.6c-7.8-7.8-7.8-20.5 0-28.3l10.1-10.1c7.8-7.8 20.5-7.8 28.3 0l177.6 177.5z"
                                fill="currentColor" />
                            <path
                                d="M750.7 827.3c-7.8-7.8-14.1-5.1-14.1 5.9V858c0 11-9 20-20 20l-475.8-0.5c-11 0-20-9-20-20V171.9c0-11 9-20 20-20h369.1c11 0 20 9 20 20v68.5c0 11 9 20 20 20h66.7c11 0 20 9 20 20v88.3c0 11 5.6 27.1 12.4 35.7l32 52.3c4.7 10 8.5 9.1 8.5-1.9l0.1-204.7c0-11-6.3-26.4-14.1-34.2L673 113.1c-7.8-7.8-23.1-14.2-34.1-14.2H190.1c-11 0-20 9-20 20v789.4c0 11 9 20 20 20h579.1c11 0 20-9 20-20v-22.5c0-11-6.4-26.4-14.1-34.1l-24.4-24.4z"
                                fill="currentColor" />
                        </svg>
                        <p class='text-base max-sm:text-base font-medium'>Pending</p>
                    </div>-->
                    <div>
                        <p class='text-sm max-sm:text-base font-medium'>Order Date : <span
                                class='ml-auto font-bold'>2004-12-22</span></p>
                    </div>

                </div>
                <!-- loop here to show the image   -->
                <ul class="mt-5 flex gap-4 flex-wrap ">
                    <li class='bg-white h-fit px-4 pb-5 pt-4 rounded-lg' style=' min-width:350px; max-width:350px;'>
                        <div class="cursor-pointer group block overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                alt="" style='min-height:370px; max-height:370px ; min-width:350px; max-width:350px;'
                                class="rounded-md w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                            <div class="relative pt-3">
                                <h3
                                    class="text-base font-semibold text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <div class="color mt-2 flex items-center gap-3 ">
                                    <div style='width: 17px; height: 17px; border-radius:50%; background-color:red'>
                                    </div>
                                    <p>Medium</p>
                                </div>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>
                                    <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class='bg-white h-fit px-4 pb-5 pt-4 rounded-lg' style=' min-width:350px; max-width:350px;'>
                        <div class="cursor-pointer group block overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                alt="" style='min-height:370px; max-height:370px ; min-width:350px; max-width:350px;'
                                class="rounded-md w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                            <div class="relative pt-3">
                                <h3
                                    class="text-base font-semibold text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <div class="color mt-2 flex items-center gap-3 ">
                                    <div style='width: 17px; height: 17px; border-radius:50%; background-color:red'>
                                    </div>
                                    <p>Medium</p>
                                </div>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>
                                    <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                </p>
                            </div>
                        </div>
                    </li>
                  
                </ul>
                <!-- order summary -->
                 <!-- if one item uses justify-center , if more than one item use justify-end -->
                <header class='flex mt-5 justify-center justify-end gap-10'>
                    <ul class=" text-gray-800 space-y-3 " style='min-width:250px;max-width:250px;'>
                        <?php if(isset($subtotal)){?>
                        <li class="flex flex-wrap gap-4 text-base">Subtotal <span class="ml-auto font-bold">KS</span>
                        </li> <?php } else{?>
                        <li class="flex flex-wrap gap-4 text-base">Subtotal <span class="ml-auto font-bold">KS</span>
                        </li> <?php }?>
                        <li class="flex flex-wrap gap-4 text-base">Shipping <span class="ml-auto font-bold">
                                30000000000000 KS
                            </span>
                        </li>
                        <li class="flex flex-wrap gap-4 text-base">Tax <span class="ml-auto font-bold">
                                KS
                            </span></li>
                        <hr class="border-gray-300" />
                        <li class="flex flex-wrap gap-4 text-base font-bold">Total <span class="ml-auto">KS</span>
                        </li>
                    </ul>

                </header>
            </div>
        </div>


    </section>


</body>

</html>