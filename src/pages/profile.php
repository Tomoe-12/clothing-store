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
    <style>
    .test {
        border: 1px solid red;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    </style>
    <!-- flowbite -->
    <link rel="stylesheet" href="../../node_modules/flowbite/dist/flowbite.min.css">
    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">

    <!-- alpine -->
    <script src="../../public/script.js"></script>


</head>

<body>

    <div class="min-h-screen   flex flex-col justify-center items-center ">
        <div
            class='relative  border border-gray-200 rounded-xl flex flex-col  gap-4  w-96 h-96   px-3 py-3 shadow-md shadow-[#F3F3F3] '>
            <div class='h-48  flex justify-center  w-full relative rounded-xl bg-image bg-cover bg-no-repeat'
                style="background-image : url('../../public/profileCoverImg.jpg')">
                <?php $per_img=perimg($_SESSION["user_id"]);
                       
                 
                
                       if(empty($per_img)){

                      ?>
                <div class="relative translate-y-1/2 ">
                    <!-- <img class="w-28 h-28 ring-4 ring-white  rounded-full" src="https://readymadeui.com/team-1.webp"
                        alt=""> -->
            
                       
                    <svg class="w-28 h-28 ring-4 ring-white bg-gray-200 rounded-full" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" stroke="#bbb">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Iconly/Curved/Profile">
                                <g id="Profile">
                                    <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8445 21.6618C8.15273 21.6618 5 21.0873 5 18.7865C5 16.4858 8.13273 14.3618 11.8445 14.3618C15.5364 14.3618 18.6891 16.4652 18.6891 18.766C18.6891 21.0658 15.5564 21.6618 11.8445 21.6618Z"
                                        stroke="#bbb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.8372 11.1735C14.26 11.1735 16.2236 9.2099 16.2236 6.78718C16.2236 4.36445 14.26 2.3999 11.8372 2.3999C9.41452 2.3999 7.44998 4.36445 7.44998 6.78718C7.4418 9.20172 9.3918 11.1654 11.8063 11.1735C11.8172 11.1735 11.8272 11.1735 11.8372 11.1735Z"
                                        stroke="#bbb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    
   
                

                         </div>
                         <?php } 
                     ?>
                <?PHP 
                if(!empty($per_img)) { 
                    ?>  <div class="relative translate-y-1/2 ">
                    <div class='w-28 h-28 ring-4 ring-white bg-gray-100 rounded-full'> 
                    <img   src="data:image/jepg;base64,<?php echo base64_encode($per_img) ?>" alt=""class='w-28 h-28 rounded-full bg-cover' >
                    </div>
                </div>
              <?php  }
                 ?>
            </div>

            <div class='flex items-center h-full '>

                <form class=" w-full px-12 mt-10  ">
                    <div>
                        <div class="space-y-6">
                            <div class="relative grid grid-cols-4 items-center justify-between ">
                                <!-- <input type="text" placeholder="Full Name"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" /> -->
                                <div class='col-span-1 h-full flex justify-center'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-5  h-5"
                                        viewBox="0 0 24 24">
                                        <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                        <path
                                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                            data-original="#000000"></path>
                                    </svg>
                                </div>
                                <div class='col-span-3 h-full flex justify-center'>
                                    <h3 class="text-lg max-sm:text-base font-semibold text-gray-800"><?Php  echo profileout("user_name",$_SESSION["user_id"])?></h3>

                                </div>

                            </div>

                            <div class=" relative grid grid-cols-4 items-center justify-between ">
                                <!-- <input type="email" placeholder="Email"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" /> -->
                                <div class='col-span-1 h-full  flex justify-center '>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-5 h-5 "
                                        viewBox="0 0 682.667 682.667">
                                        <defs>
                                            <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                                <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                            </clipPath>
                                        </defs>
                                        <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                            <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                                d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                                data-original="#000000"></path>
                                        </g>
                                    </svg>
                                </div>

                                <div class='col-span-3 h-full flex justify-center '>
                                    <h3 class="text-lg max-sm:text-base font-semibold text-gray-800"><?Php  echo profileout("email",$_SESSION["user_id"])?> </h3>
                                </div>

                            </div>


                            <div class=" relative grid grid-cols-4 items-center justify-between ">
                                <!-- <input type="email" placeholder="Email"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" /> -->
                                <div class='col-span-1 h-full  flex items-center justify-center '>
                                    <svg class='w-5 h-5' fill="#bbb" height="200px" width="200px" version="1.1"
                                        id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 473.806 473.806"
                                        xml:space="preserve" stroke="#bbb">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4 c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8 c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6 c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5 c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26 c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9 c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806 C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20 c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6 c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1 c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3 c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5 c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8 c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9 l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1 C420.456,377.706,420.456,388.206,410.256,398.806z">
                                                    </path>
                                                    <path
                                                        d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2 c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11 S248.656,111.506,256.056,112.706z">
                                                    </path>
                                                    <path
                                                        d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11 c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2 c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                                <div class='col-span-3 h-full flex justify-center '>
                                    <h3 class="text-lg max-sm:text-base font-semibold text-gray-800"><?Php  echo profileout("ph_no",$_SESSION["user_id"])?> </h3>
                                </div>

                            </div>

                            <!-- <div class="relative flex items-center">
                                    <input type="number" placeholder="Phone No."
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" />
                                    <svg fill="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 64 64">
                                        <path
                                            d="m52.148 42.678-6.479-4.527a5 5 0 0 0-6.963 1.238l-1.504 2.156c-2.52-1.69-5.333-4.05-8.014-6.732-2.68-2.68-5.04-5.493-6.73-8.013l2.154-1.504a4.96 4.96 0 0 0 2.064-3.225 4.98 4.98 0 0 0-.826-3.739l-4.525-6.478C20.378 10.5 18.85 9.69 17.24 9.69a4.69 4.69 0 0 0-1.628.291 8.97 8.97 0 0 0-1.685.828l-.895.63a6.782 6.782 0 0 0-.63.563c-1.092 1.09-1.866 2.472-2.303 4.104-1.865 6.99 2.754 17.561 11.495 26.301 7.34 7.34 16.157 11.9 23.011 11.9 1.175 0 2.281-.136 3.29-.406 1.633-.436 3.014-1.21 4.105-2.302.199-.199.388-.407.591-.67l.63-.899a9.007 9.007 0 0 0 .798-1.64c.763-2.06-.007-4.41-1.871-5.713z"
                                            data-original="#000000"></path>
                                    </svg>
                                </div> -->
                        </div>
                    </div>
                </form>
            </div>
            <button onclick="location.href='../components/edit.php'"
                class='absolute w-14 h-14 rounded-full border border-gray-200 bg-white flex items-center justify-center'
                style="top :-5%; right:-7%;">
                <svg class='w-10 h-10' fill="#2563EB" viewBox="0 0 24 24" id="update-alt-2" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color" stroke="#2563EB"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M6,5H16a2,2,0,0,1,2,2v7" style="fill: none; stroke: #2563EBbbb; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M18,19H8a2,2,0,0,1-2-2V10" style="fill: none; stroke: #2563EBbbb; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><polyline id="secondary" points="15 11 18 14 21 11" style="fill: none; stroke: #2563EBbbb2ca9bc; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline><polyline id="secondary-2" data-name="secondary" points="9 13 6 10 3 13" style="fill: none; stroke: #2563EBbbb2ca9bc; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline></g></svg>
            </button>



        </div>

        <!-- <div class=' w-96  mt-5  '>
            <button onclick="location.href='../components/edit.php'"
                class="w-full h-9 px-2.5 py-1.5  bg-primary hover:bg-blue-700 text-base text-white rounded-lg flex justify-center items-center ">Update</button>
        </div> -->

        <div class=' w-96  mt-5  '>
            <button onclick="location.href='../components/logout.php'"
                class="w-full h-9 px-2.5 py-1.5  bg-primary hover:bg-blue-700 text-base text-white rounded-lg flex justify-center items-center ">Logout</button>
        </div>



    </div>


</body>

</html>