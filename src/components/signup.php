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

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">
    <!-- alpine -->
    <script src="../../public/script.js"></script>

    <style>

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
   -->

    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt=""
                    src="https://images.unsplash.com/photo-1617195737496-bc30194e3a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-80" />

                <!-- <div class="hidden lg:relative lg:block lg:p-12">
                    <a class="block text-white" href="#">
                        <span class="sr-only">Home</span>
                        <svg class="h-8 sm:h-10" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                                fill="currentColor" />
                        </svg>
                    </a>

                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Welcome to Squid 🦑
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam dolorum aliquam,
                        quibusdam aperiam voluptatum.
                    </p>
                </div> -->
            </section>

            <main
                class="flex items-center  justify-center px-8 py-8 sm:px-12 lg:col-span-7  lg:py-12 xl:col-span-6">
                <div class="max-w-2xl lg:max-w-3xl">
                    <div class="relative -mt-16 block ">
                        <a class="inline-flex size-16 items-center justify-center rounded-full bg-white text-blue-600 sm:size-20"
                            href="#">
                            <span class="sr-only">Home</span>
                            <svg class="h-8 sm:h-10" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                                    fill="currentColor" />
                            </svg>
                        </a>

                        <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Welcome to Squid 🦑
                        </h1>

                        <p class="mt-4 leading-relaxed text-gray-500">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam dolorum aliquam,
                            quibusdam aperiam voluptatum.
                        </p>
                    </div>


                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
                        class="mt-8 grid grid-cols-6 gap-6 gap-y-7">

                        <div class='col-span-6 '>
                            <label class="block text-base font-medium text-gray-800" for="name">Username</label>
                            <input
                                class="mt-1 w-full rounded-md border-gray-300 bg-white text-base text-gray-800 shadow-sm outline-blue-600"
                                placeholder="Name" type="text" id="name" name='username' />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <div>
                                <label class="block text-base font-medium text-gray-800" for="email">Email</label>
                                <input
                                    class="mt-1 w-full rounded-md border-gray-300 bg-white text-base text-gray-800 shadow-sm"
                                    placeholder="Email address" name='email' type="email" id="email" />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div>
                                <label class="block text-base font-medium text-gray-800" for="phone">Contact
                                    Number</label>
                                <input
                                    class="mt-1 w-full rounded-md border-gray-300 bg-white text-base text-gray-800 shadow-sm"
                                    placeholder="Phone Number" name='ph_no' type="text" id="phone" />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div>
                                <label class="block text-base font-medium text-gray-800" for="email">Password</label>
                                <input
                                    class="mt-1 w-full rounded-md border-gray-300 bg-white text-base text-gray-800 shadow-sm"
                                    placeholder="Password" type="password" id="email" name='pass' />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div>
                                <label class="block text-base font-medium text-gray-800" for="phone">Confirm
                                    Password</label>
                                <input
                                    class="mt-1 w-full rounded-md border-gray-300 bg-white text-base text-gray-800 shadow-sm"
                                    placeholder="Confirm Password" type="text" id="phone" name='repass' />
                            </div>
                        </div>


                        <div class="col-span-6">
                            <label class="block text-base font-medium text-gray-800" for="address">Address</label>
                            <textarea class="mt-1 w-full  border-gray-300 bg-white text-base text-gray-800 shadow-sm"
                                placeholder="Message" rows="5" id="address" name='address'></textarea>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit"
                                class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-base font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                Create an account
                            </button>

                            <p class="mt-4 text-base text-gray-800 sm:mt-0">
                                Already have an account?
                                <a href="./login.php" class="hover:underline font-semibold text-primary">Log in</a>.
                            </p>
                        </div>
                    </form>
                    <div id="success" style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:green;border-radius:10px;"> Sign Up Successfully</div>
<div id="unsuccess" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;">Already have an account .Please Login ! </div>
<div id="pass" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;"> Password and confirm password must be the same!</div>
<div id="complete" style="margin-top:10px;text-align:center; background-color:white;padding:10px; color:red;border-radius:10px;"> Please fill the form completely!</div>



                </div>
            </main>
        </div>
    </section>


    <!-- 
        </form>
    </div> -->
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
document.getElementById("unsuccess").style.display = "block";
</script>
<?php
                   
                }  
   
            } 
            if(!$key){ 
                try{
                  $hash=password_hash($pass,PASSWORD_DEFAULT)  ;
                $con->query("INSERT INTO customers (user_name,email,pass,ph_no,address) VALUES ('$username','$email','$hash','$ph_no','$address')");
               $result=true;
               ?>
<script>
if(<?php  echo $result ?>){
    alert("Sign Up Successfully!");
} 
</script>
<?php
            }catch(mysqli_sql_exception){
                echo"sign up fail";
            }
            } 
           
           
      
    }
}
     else{ ?>
<script>
document.getElementById("pass").style.display = "block"
</script>

<?php
        $key=true;
         
    } 

} 



    

    
    ?>