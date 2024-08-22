<?php 
include("../function/connection.php");
session_start(); 
$user_id=$_SESSION["user_id"]; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    </style>
</head>

<body>
    <!-- <a href="../pages/home.php">Back</a>
    <?php
    ob_start();
$result=$con->query("SELECT * FROM customers  WHERE cus_id='$user_id'");
if(!empty($result)&& $result->num_rows>0){
 if($row=$result->fetch_assoc()){?>
 <div class="profile">
 <img   src="data:image/jepg;base64,<?php echo base64_encode($row["per_img"]) ?>" alt="" style="max-height:300px;max-width:250px;border-radius:20px;" >
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">
<label for="" style="color:lightgray;fontsize:13px"> <input type="text"  value="<?php echo $row["user_name"] ?>" name="user_name" style="border:none;font-size:larger;color:white;background-color:transparent;"> <br>Tap to change the username </label><br>
    <hr>
    <label for="" style="color:lightgray;fontsize:13px"> <input type="text" value="<?php echo $row["address"] ?>" name="address" style="border:none; font-size:large;color:white;background-color:transparent;"> <br> Tap to change the address </label><br>
    <hr>
    <label for="" style="color:lightgray;fontsize:13px"> <input type="text" value="<?php echo $row["ph_no"] ?>" name="connum" style="border:none; font-size:large;color:white;background-color:transparent;">  <br>Tap to change the contact number </label><br>
    <hr>
<label style="color:lightgray;font-size:15px"><input style="border-radius:10px;background-color:green;" type="file" name="image" accept="img/*"> <br>Choose a Profile picture</label> <br><hr>
<input id="save" style=" background-color:green;color:white;padding:10px 20px;margin-left:35%;margin-top:20px;border-radius:10px;font-weight:bold;font-size:17px;" type="submit" name="Post" value="Save">
</div>  -->


    <div class="min-h-screen  flex flex-col justify-center items-center ">
        <div
            class='border border-gray-200 rounded-xl flex flex-col gap-4 w-96 h-96 px-3 py-3 shadow-md shadow-[#F3F3F3] '>
            <div class='h-48 flex justify-center  w-full relative rounded-xl bg-image bg-cover bg-no-repeat'
                style="background-image : url('../../public/profileCoverImg.jpg')">

                <div class="relative translate-y-1/2 ">
                    <!-- <img class="w-28 h-28 ring-4 ring-white  rounded-full" src="https://readymadeui.com/team-1.webp"
                        alt=""> -->
                    <!-- <svg class="w-28 h-28 ring-4 ring-white bg-gray-100 rounded-full" viewBox="0 0 24 24" fill="none"
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
                    </svg> -->

                   


                    <input class='hidden' type="file" id="file-2" accept="image/*">
                    <label for="file-2" id="file-2-preview">
                    <div class='w-28 h-28 ring-4 ring-white bg-gray-100 rounded-full'>
                        <img id="file-2-preview-img" src="../../public/profile.svg" alt="" class='w-28 h-28 rounded-full bg-cover'>
                    </div>
                        <div
                            class='absolute cursor-pointer border border-gray-400 flex items-center justify-center w-9 h-9 top-0 right-0 rounded-full bg-white '>
                            <span>
                                <svg class='w-7 h-7' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="12" cy="13" r="3" stroke="#bbb" stroke-width="1.5"></circle>
                                        <path
                                            d="M9.77778 21H14.2222C17.3433 21 18.9038 21 20.0248 20.2646C20.51 19.9462 20.9267 19.5371 21.251 19.0607C22 17.9601 22 16.4279 22 13.3636C22 10.2994 22 8.76721 21.251 7.6666C20.9267 7.19014 20.51 6.78104 20.0248 6.46268C19.3044 5.99013 18.4027 5.82123 17.022 5.76086C16.3631 5.76086 15.7959 5.27068 15.6667 4.63636C15.4728 3.68489 14.6219 3 13.6337 3H10.3663C9.37805 3 8.52715 3.68489 8.33333 4.63636C8.20412 5.27068 7.63685 5.76086 6.978 5.76086C5.59733 5.82123 4.69555 5.99013 3.97524 6.46268C3.48995 6.78104 3.07328 7.19014 2.74902 7.6666C2 8.76721 2 10.2994 2 13.3636C2 16.4279 2 17.9601 2.74902 19.0607C3.07328 19.5371 3.48995 19.9462 3.97524 20.2646C5.09624 21 6.65675 21 9.77778 21Z"
                                            stroke="#bbb" stroke-width="1.5"></path>
                                        <path d="M19 10H18" stroke="#bbb" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                    </g>
                                </svg>

                            </span>

                        </div>


                    </label>
                </div>

            </div>

            <div class='flex flex-col  items-center h-full '>

                <form class="w-full px-12 mt-14 ">
                    <div>
                        <div class="space-y-4 ">

                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-5  h-5"
                                        viewBox="0 0 24 24">
                                        <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                        <path
                                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                            data-original="#000000"></path>
                                    </svg>

                                </span>

                                <input type="text"
                                    class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                                    placeholder="Username">
                            </div>

                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
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

                                </span>

                                <input type="text"
                                    class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                                    placeholder="Email">
                            </div>

                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
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

                                </span>

                                <input type="text"
                                    class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
                                    placeholder="Phone">
                            </div>

                        </div>
                    </div>
                </form>

            </div>

        </div>
        <div class='w-96 flex gap-10  mt-5  '>
            <button onclick="location.href='../pages/profile.php'"
                class="w-full h-9 px-2.5 py-1.5  bg-white text-base text-primary border border-blue-600 rounded-md flex justify-center items-center ">Cancel</button>
            <button onclick="location.href='../components/edit.php'"
                class="w-full h-9 px-2.5 py-1.5  bg-primary hover:bg-blue-700 text-base text-white rounded-md flex justify-center items-center ">Update</button>
        </div>

    </div>












    <?php
 }}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_name=$_POST["user_name"];
    $address=$_POST["address"];
    $ph_no=$_POST["connum"];
    if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
        $image=$_FILES["image"]["tmp_name"];
        $image_content=file_get_contents($image);
        $statement=$con->prepare("UPDATE customers SET user_name='$user_name', address='$address' , ph_no='$ph_no', per_img=? where cus_id='$user_id'");
        $statement->bind_param("s",$image_content);
        $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
     if($current_id){
        header("Location:edit.php");

       
         
     } 
     else {
         echo"fail to insert";
     }
      }
      else{ 
        try{
            $con->query("UPDATE customers SET user_name='$user_name', address='$address' , ph_no='$ph_no' where cus_id='$user_id'");
            header("Location:edit.php");

            ob_end_flush();

        }catch(mysqli_sql_exception){

        }

      }
    } 
 
?>



</body>
<script>
function previewBeforeUpload(id) {
    document.querySelector("#" + id).addEventListener("change", function(e) {
        if (e.target.files.length == 0) {
            return;
        }
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        document.querySelector("#" + id + "-preview div img").src = url;
    });
}

previewBeforeUpload("file-2");
</script>

</html>