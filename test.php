<?php 
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post"  enctype="multipart/form-data">

<label>Image <input type="file" name="image" accept="img/*"></label><br>
<input type="submit" name="save" value="Post">
</form>
<?php 
if(isset($_POST["save"])){


if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){
    $image=$_FILES["image"]["tmp_name"];
    $image_content=file_get_contents($image);
    $statement=$con->prepare("UPDATE  customers  SET per_img=? where cus_id=1");
    $statement->bind_param("s",$image_content);
    $current_id= $statement->execute() or die("<b> Error </b> problem on image insertion".mysqli_connect_error());
 if($current_id){
     echo"inserted successfully<a href='home.php'>view all images</a>";
     
 } 
 else {
     echo"fail to insert";
 }
  }
  else{
    echo "please select an image";
  }
} 
$con->close();


?>
</body>
</html>










<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> -->
     <!-- <a href="../pages/home.php">Back</a>
    <div class="signupbox">

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> -->
    <!-- <h1>Sign Up</h1>
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
<div id="complete" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;"> Please fill the form completely!</div> -->

    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

 <!-- data table -->
 <div class='container flex flex-col main px-3 py-4 h-fit'>


<h1 class='main-text text-black text-xl sm:text-3xl'>Dashboard</h1>

<!-- upper 4 boxes-->
<div class='w-full grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-10 '>

    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
        <div class="flex p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z">
                </path>
            </svg>
            <h3 class="ml-2 text-base text-gray-500 font-medium">Collected</h3>
        </div>
        <p class=" rounded-xl bg-white px-4 py-8 text-center text-2xl">$3,313.44
        </p>
    </div>

    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
        <div class="flex p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
            </svg>
            <h3 class="ml-2 text-base text-gray-500 font-medium">Pending</h3>
        </div>
        <p class="rounded-xl bg-white px-4 py-8 text-center text-2xl">
            $125,968.64
        </p>
    </div>

    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
        <div class="flex p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z">
                </path>
            </svg>
            <h3 class="ml-2 text-base text-gray-500 font-medium">Collected</h3>
        </div>
        <p class=" rounded-xl bg-white px-4 py-8 text-center text-2xl">$3,313.44
        </p>
    </div>

    <div class="rounded-xl bg-gray-100 p-2 shadow-sm">
        <div class="flex p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-5 w-5 text-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z">
                </path>
            </svg>
            <h3 class="ml-2 text-base text-gray-500 font-medium">Total Customers</h3>
        </div>
        <p class=" rounded-xl bg-white px-4 py-8 text-center text-2xl">6</p>
    </div>


</div>

<!-- Page Wrapper -->
<div class='w-full my-10 '>
    <table class='rounded border' id="selection-table">
        <thead>
            <tr>
                <th class='noSort bg-gray-100'>
                    <span class="flex items-center">
                        Image
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class='bg-gray-100' data-type="date" data-format="YYYY/DD/MM">
                    <span class="flex items-center">
                        Type
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class='bg-gray-100'>
                    <span class="flex items-center">
                        Instock
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class='bg-gray-100'>
                    <span class="flex items-center">
                        Price
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class='noSort bg-gray-100'>
                    <span class="flex items-center">
                        Edit
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
                <th class='noSort bg-gray-100'>
                    <span class="flex items-center">
                        Delete
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                        </svg>
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-50 cursor-pointer">
                <td class="font-medium text-gray-900 whitespace-nowrap ">Flowbite</td>
                <td>2021/25/09</td>
                <td>269000</td>
                <td>49%</td>
                <td>269000</td>
                <td>49%</td>
            </tr>
            <tr class="hover:bg-gray-50 cursor-pointer">
                <td class="font-medium text-gray-900 whitespace-nowrap ">React</td>
                <td>2013/24/05</td>
                <td>4500000</td>
                <td>24%</td>
                <td>269000</td>
                <td>49%</td>
            </tr>
            <tr class="hover:bg-gray-50 cursor-pointer">
                <td class="font-medium text-gray-900 whitespace-nowrap ">Flowbite</td>
                <td>2021/25/09</td>
                <td>269000</td>
                <td>49%</td>
                <td>269000</td>
                <td>49%</td>
            </tr>
            <tr class="hover:bg-gray-50 cursor-pointer">
                <td class="font-medium text-gray-900 whitespace-nowrap ">React</td>
                <td>2013/24/05</td>
                <td>4500000</td>
                <td>24%</td>
                <td>269000</td>
                <td>49%</td>
            </tr>
            <tr class="hover:bg-gray-50 cursor-pointer">
                <td class="font-medium text-gray-900 whitespace-nowrap ">Flowbite</td>
                <td>2021/25/09</td>
                <td>269000</td>
                <td>49%</td>
                <td>269000</td>
                <td>49%</td>
            </tr>
            <tr class="hover:bg-gray-50 cursor-pointer">
                <td class="font-medium text-gray-900 whitespace-nowrap ">React</td>
                <td>2013/24/05</td>
                <td>4500000</td>
                <td>24%</td>
                <td>269000</td>
                <td>49%</td>
            </tr>
        </tbody>
    </table>



</div>
<!-- /.container-fluid -->
</div>