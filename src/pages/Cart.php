<?php 
include("../function/connection.php");
session_start(); 
include("../function/functions.php");

if(empty( $_SESSION["res"])){
    echo"";
}
if( isset($_SESSION["update"] )){
    $_SESSION["update"]=null;
    $update=true;
}  
 ?>
 <script>
     if(<?php echo $update ?>){
        alert("Update Successfully!");
    }
 </script>
  <?php
if(isset($_SESSION["res"])){ 
    $res=true;
    $_SESSION["res"]=null;
    ?>
<script>
    if(<?php echo $res?>){
        alert("Order all items Successfully!");
    }
   
</script>
<?php
}
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
    .disabled {
        opacity: 0.5;
        pointer-events: none;
    }
    </style>

</head>

<body>
    <div class='w-full h-36 flex justify-center items-center  mt-10'>
        <h1 class="text-3xl font-bold text-gray-800 text-center">Shopping Cart</h1>
    </div>

    <div class="container px-6 py-0 mx-auto   flex justify-center ">

        <div class="font-sans w-fit mx-auto  bg-white ">

            <div class="grid md:grid-cols-3 gap-5">

                <!-- items box  -->
                <div class="md:col-span-2 space-y-4  h-full overflow-scroll">
                <?php  
               
                
    if(!empty($_SESSION["user_id"])){
        $user_id=$_SESSION["user_id"];
       
        $result=$con->query("SELECT * FROM cart JOIN closet ON closet.clo_id=cart.clo_id JOIN customers ON customers.cus_id=cart.cus_id WHERE cart.cus_id='$user_id' ");
        if(!empty($result)&& $result->num_rows>0){
           $subtotal=0;
           while($row=$result->fetch_assoc()){
            $email=$row["email"];
            $user_name=$row["user_name"];
$clo_id=$row["clo_id"];
            $user_id=$row["cus_id"];

           
            
            
           ?>
                    <div class="grid grid-cols-3 items-start gap-4">
                        <div class="col-span-2 flex items-start gap-4">
                            <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                <img  src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>"
                                    class="w-full h-full object-contain" />
                                    
                            </div>

                            <div class="flex flex-col">
                                <h3 class="text-base font-bold text-gray-800">Velvet Sneaker</h3>
                                <p class="text-xs font-semibold text-gray-500 mt-0.5"><?php echo $row["size"]?></p>
                                <form action="../function/cartitemremove.php" method="post" >
                                    <input type="text" name="cart_id" value="<?php  echo $row["cart_id"] ?>" style="display: none;">
                                    <input type="text" name="clo_id" value="<?php  echo $row["clo_id"] ?>" style="display: none;">
                                    <input type="text" name="quantity" value="<?php  echo $row["quantity"] ?>"style="display: none;">
                                    <input type="text" name="size" value="<?php  echo $row["size"] ?>" style="display: none;">
                                   
                                  
                                <button type="submit" name="remove"
                                    class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                            data-original="#000000"></path>
                                        <path
                                            d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                            data-original="#000000"></path>
                                    </svg>
                                   REMOVE
                                  
                                </button>
                                </form>
     <a href="../components/updateitem.php?cart_id=<?php echo $row["cart_id"]?>&&  clo_id=<?php echo $row["clo_id"] ?> && quantity=<?php  echo $row["quantity"]?> && size=<?php echo $row["size"]  ?> && price=<?php echo $row["price"] ?> " >Update</a>
                            </div>
                        </div>

                        <div class="ml-auto">
                           
                            <h4 class="text-lg max-sm:text-base font-bold text-gray-800"><?php  $subtotal+=$row["orderprice"];
                             echo  $row["orderprice"]?></h4>
                             

                            <div
                                class=" mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                <button  type="button" id="decrement-button" 
                                    data-input-counter-decrement="quantity-input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                                <input type="text" id="quantity-input" data-input-counter
                                    aria-describedby="helper-text-explanation" 
                                    
                                    class=" w-12 h-5 font-semibold bg-white text-gray-900 text-base  text-center border-none focus:ring-none  block  py-2.5 "
                                    value='<?php echo $row["quantity"]?>' required />
                                    <p calss="text"></p>
                                <button type="button" id="increment-button" 
                                    data-input-counter-increment="quantity-input">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>


                        </div>
                    </div> <?PHP }}} ?>

                    <hr class="border-gray-300" />


                </div>

                <!-- summary box -->
                <div class="bg-gray-100 rounded-md w-full p-4 h-max">
                    <h3 class="text-lg max-sm:text-base font-bold text-gray-800 border-b border-gray-300 pb-2">Order
                        Summary
                    </h3>

                    <form class="mt-6">
                        <div>
                            <div class="space-y-5">
                                <div class="relative flex items-center justify-between">
                                    <!-- <input type="text" placeholder="Full Name"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" /> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-5 h-5"
                                        viewBox="0 0 24 24">
                                        <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                        <path
                                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                            data-original="#000000"></path>
                                    </svg>
                                    <h3 class="text-base max-sm:text-sm font-semibold text-gray-800"><?php echo usernameout($user_id); ?></h3>


                                </div>

                                <div class=" relative flex items-center justify-between">
                                    <!-- <input type="email" placeholder="Email"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" /> -->
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
                                    <h3 class="text-base max-sm:text-sm font-semibold text-gray-800"><?php  echo emailout($user_id)?> </h3>


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

                    <ul class="text-gray-800 mt-8 space-y-3">
                        <?php if(isset($subtotal)){?>
                        <li class="flex flex-wrap gap-4 text-sm">Subtotal <span class="ml-auto font-bold"><?php echo $subtotal;?>KS</span>
                        </li> <?php } else{?>
                            <li class="flex flex-wrap gap-4 text-sm">Subtotal <span class="ml-auto font-bold"><?php echo $subtotal=0;?>KS</span>
                        </li> <?php }?>
                        <li class="flex flex-wrap gap-4 text-sm">Shipping <span class="ml-auto font-bold"><?PHP  echo $shipping=3000?>KS</span>
                        </li>
                        <li class="flex flex-wrap gap-4 text-sm">Tax <span class="ml-auto font-bold"><?PHP  echo $tax=1000?>KS</span></li>
                        <hr class="border-gray-300" />
                        <li class="flex flex-wrap gap-4 text-sm font-bold">Total <span class="ml-auto"><?php echo $subtotal+$shipping+$tax; ?>KS</span>
                        </li>
                    </ul>

                    <div class="mt-6 w-full space-y-3 ">
                       
                        <button type="submit"
                            class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-primary hover:bg-blue-700 text-white rounded-md">
                            <label for="order">Order Now</label>  
                        </button>
                        <button type="button"
                            class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent text-gray-800 border border-gray-300 rounded-md"
                            onclick="location.href='./home.php'">Continue
                            Shopping
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
  <form action="../function/cartmovorder.php" method="post" style="display: none;">
    <input type="text" name="user_id" value="<?php  echo $user_id;?>">
    <input type="submit" name="submit" value="submit" id="order">
  </form>
</body>

 
<script>
    

const quantityInput = document.getElementById('quantity-input');
const incrementButton = document.getElementById('increment-button');
const decrementButton = document.getElementById('decrement-button');

incrementButton.addEventListener('click', () => {
    const currentValue = parseInt(quantityInput.value, 10);
    quantityInput.value = currentValue + 0.5;
    decrementButton.classList.remove('disabled');
});

decrementButton.addEventListener('click', () => {
    const currentValue = parseInt(quantityInput.value, 10);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 0.5;
    } else if (currentValue === 1) {
        console.log('1');
        quantityInput.value = 1;
        decrementButton.classList.add('disabled');
    }
});
</script>


</html>