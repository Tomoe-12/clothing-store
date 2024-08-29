<?php 
include("../function/connection.php");
session_start();
include("../function/functions.php");
$key=false;
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
    <link rel="stylesheet" href="../css/details.css">
    <style>
    #size {
        display: none;
    }

    .selected {
        border: 1px solid #2563EB;
        background-color: #2563EB;
        color: white;

    }

    .unSelected {
        background-color: white;
    }
    </style>
</head>

<body>

    <div class="min-h-screen flex justify-center items-center">
        <?php 
   $item_id=$_GET["item_id"];
  
  
   $result=$con->query("SELECT * FROM closet WHERE clo_id='$item_id' ");
   if(!empty($result)&& $result->num_rows>0){
    while($row=$result->fetch_assoc()){ 
        $clo_id=$row["clo_id"];
    $price=$row["price"];
      $instock=$row["instock"];
        ?>

        <form action=" <?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="font-sans p-8 tracking-wide max-lg:max-w-2xl mx-auto">

                <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="space-y-4 text-center lg:sticky top-8">
                        <div class="bg-gray-100 p-4 flex items-center sm:h-[380px] rounded-lg">
                            <img src="data:image/jepg;base64,<?php echo base64_encode(retriimg($row["clo_id"])) ?>" alt="Product"
                                class="w-full max-h-full object-contain object-top" />
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-100 p-4 flex items-center rounded-lg sm:h-[182px]">
                                <img src="data:image/jepg;base64,<?php echo base64_encode(retrimulimg($row["clo_id"])) ?>" alt="Product"
                                    class="w-full max-h-full object-contain object-top" />
                            </div>

                            <div class="bg-gray-100 p-4 flex items-center rounded-lg sm:h-[182px]">
                                <img src="data:image/jepg;base64,<?php echo base64_encode(retrimulimg2($row["clo_id"])) ?>" alt="Product"
                                    class="w-full max-h-full object-contain object-top" />
                            </div>
                        </div>
                    </div>

                    <div class="max-w-xl">
                        <div>
                            <h2 class="text-2xl font-extrabold text-gray-800">Dark blue sneakers with white laces</h2>
                            <!-- <h2 class="text-2xl font-extrabold text-gray-800"></h2> -->
                            <p class="text-sm text-gray-600 mt-2"><?php echo $row["type"]?></p>
                        </div>

                        <!-- review and star  -->
                        <!-- <div class="flex space-x-1 mt-4">
                            <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>

                            <button type="button"
                                class="px-2.5 py-1.5 bg-gray-100 text-xs text-gray-800 rounded-lg flex items-center !ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-1" fill="currentColor"
                                    viewBox="0 0 32 32">
                                    <path
                                        d="M14.236 21.954h-3.6c-.91 0-1.65-.74-1.65-1.65v-7.201c0-.91.74-1.65 1.65-1.65h3.6a.75.75 0 0 1 .75.75v9.001a.75.75 0 0 1-.75.75zm-3.6-9.001a.15.15 0 0 0-.15.15v7.2a.15.15 0 0 0 .15.151h2.85v-7.501z"
                                        data-original="#000000" />
                                    <path
                                        d="M20.52 21.954h-6.284a.75.75 0 0 1-.75-.75v-9.001c0-.257.132-.495.348-.633.017-.011 1.717-1.118 2.037-3.25.18-1.184 1.118-2.089 2.28-2.201a2.557 2.557 0 0 1 2.17.868c.489.56.71 1.305.609 2.042a9.468 9.468 0 0 1-.678 2.424h.943a2.56 2.56 0 0 1 1.918.862c.483.547.708 1.279.617 2.006l-.675 5.401a2.565 2.565 0 0 1-2.535 2.232zm-5.534-1.5h5.533a1.06 1.06 0 0 0 1.048-.922l.675-5.397a1.046 1.046 0 0 0-1.047-1.182h-2.16a.751.751 0 0 1-.648-1.13 8.147 8.147 0 0 0 1.057-3 1.059 1.059 0 0 0-.254-.852 1.057 1.057 0 0 0-.795-.365c-.577.052-.964.435-1.04.938-.326 2.163-1.71 3.507-2.369 4.036v7.874z"
                                        data-original="#000000" />
                                    <path
                                        d="M4 31.75a.75.75 0 0 1-.612-1.184c1.014-1.428 1.643-2.999 1.869-4.667.032-.241.055-.485.07-.719A14.701 14.701 0 0 1 1.25 15C1.25 6.867 7.867.25 16 .25S30.75 6.867 30.75 15 24.133 29.75 16 29.75a14.57 14.57 0 0 1-5.594-1.101c-2.179 2.045-4.61 2.81-6.281 3.09A.774.774 0 0 1 4 31.75zm12-30C8.694 1.75 2.75 7.694 2.75 15c0 3.52 1.375 6.845 3.872 9.362a.75.75 0 0 1 .217.55c-.01.373-.042.78-.095 1.186A11.715 11.715 0 0 1 5.58 29.83a10.387 10.387 0 0 0 3.898-2.37l.231-.23a.75.75 0 0 1 .84-.153A13.072 13.072 0 0 0 16 28.25c7.306 0 13.25-5.944 13.25-13.25S23.306 1.75 16 1.75z"
                                        data-original="#000000" />
                                </svg>
                                87 Reviews
                            </button>
                        </div> -->

                        <div class="mt-4">
                            <h3 class="text-gray-800 text-4xl font-bold" id="price"><?php echo $row["price"]?>KS</h3>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-bold text-gray-800">Choose a Size</h3>
                            <div class="flex flex-row flex-wrap gap-4 mt-4">
                                <?php 
                               $small= sizeout("Small",$row["clo_id"]);
                               $medium= sizeout("Medium",$row["clo_id"]);
                               $large= sizeout("Large",$row["clo_id"]);
                               $XL= sizeout("XL",$row["clo_id"]);
                               $XXL= sizeout("XXL",$row["clo_id"]);
                               if($small>0){ ?>
                                <label for="small" id="size-sm"
                                    class="w-10 h-10 border  hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="SM">SM</label>
                                <?php   }
                               
                       if($medium>0) {  ?>
                                <label for="medium" id="size-md"
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="MD">MD</label>
                                <?php   }   
                    if($large>0)   { ?>
                                <label for="large" id="size-lg"
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="LG">LG </label>
                                <?php    } 
                if($XL>0){ ?>
                                <label for="XL" id="size-xl"
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="XL"> XL</label>
                                <?Php      } 
          if($XXL>0){ ?>
                                <label for="XXL" id="size-xxl"
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="XXL">XXL</label>
                                <?php  }
                ?>





                                <div class="radio hidden">
                                    <input type="radio" id="small" value="small" name="size">
                                    <input type="radio" id="medium" value="medium" name="size">
                                    <input type="radio" id="large" value="large" name="size">
                                    <input type="radio" id="XL" value="XL" name="size">
                                    <input type="radio" id="XXL" value="XXL" name="size">
                                </div>


                            </div>
                        </div>
                        <div class="mt-4 " max-w-xs mx-auto">
                            <h3 class="text-xl font-bold text-gray-800">Quantity</h3>


                            <div class="relative mt-4 flex items-center max-w-[8rem] border border-gray-200 rounded-lg">
                                <button type="button" id="decrement-button"
                                    data-input-counter-decrement="quantity-input"
                                    class="bg-gray-100 border border-l-gray-200  hover:bg-gray-200  rounded-s-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3  text-primary dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="quantity-input" data-input-counter name="quantity"
                                    aria-describedby="helper-text-explanation"
                                    class=" w-full h-11 font-semibold bg-white text-gray-900 text-lg  text-center border border-gray-100 focus:ring-none  block  py-2.5 "
                                    placeholder="0" required />
                                <button type="button" id="increment-button"
                                    data-input-counter-increment="quantity-input"
                                    class="bg-blue-600 border border-blue-600 hover:bg-blue-700  rounded-e-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-white " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div id="insufficient"
                            style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:red;border-radius:10px;">
                            Insufficient in stock item number</div>
                        <div id="success"
                            style="margin-top:10px;text-align:center;background-color:white;padding:10px;color:green;border-radius:10px;">
                            Order Successfully</div>
                        <div id="unsuccess"
                            style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:red;border-radius:10px;">
                            Unable to order. Please Login first!</div>
                        <div id="size"
                            style="margin-top:10px;text-align:center;background-color:white;padding:10px; color:red;border-radius:10px;">
                            Please Select size</div>
                        <div id="zero"
                            style="margin-top:10px;text-align:center; background-color:white;padding:10px;color:red;border-radius:10px;">
                            Your order quantity must be greater than zero</div>

                        <div class=" gap-4 mt-10">
                            <input type="submit" value="Add to Cart" name="order"
                                class="min-w-[200px] px-4 py-3 text-center bg-primary hover:bg-blue-700 text-white text-sm font-semibold rounded-lg">
                            <btton type='button' onclick="location.href='../pages/home.php'"
                                class="min-w-[200px] px-4 py-3 text-center border border-blue-600 bg-transparent  text-primary text-sm font-bold rounded-lg cursor-pointer">
                                Cancel
                                </button>
                        </div>

                        <div class="mt-8">


                            <div class="mt-8">
                                <h3 class="text-xl font-bold text-gray-800">Product Description</h3>
                                <p class="text-base text-gray-700 mt-4">Step up your footwear game with our premium
                                    men's
                                    shoes.
                                    Designed for comfort and crafted with a contemporary aesthetic, these versatile
                                    shoes
                                    are a
                                    must-have addition to your wardrobe. The supple and breathable materials ensure
                                    all-day
                                    comfort, making them perfect for everyday wear.</p>
                            </div>

                            <ul class="space-y-3 list-disc mt-6 pl-4 text-sm text-gray-600">
                                <li>A pair of gray shoes is a wardrobe essential due to its versatility.</li>
                                <li>Available in a wide range of sizes, from extra small to extra large, and even in
                                    tall
                                    and
                                    petite sizes.</li>
                                <li>Easy to maintain, they can be machine-washed and dried on low heat.</li>
                                <li>Personalize them with your own designs, patterns, or embellishments to make them
                                    uniquely
                                    yours.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>






        </form>


        <?php   }}
  
 
  ?>
    </div>
    <?php 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        


        if(empty($_SESSION["user_id"])){
            ?>
    <script>
    document.getElementById("unsuccess").style.display = "block";
    </script>
    <?php
        } 
        else {
            $size=filter_input(INPUT_POST,"size",FILTER_SANITIZE_SPECIAL_CHARS);
                if(isset($size)){
            $quantity=filter_input(INPUT_POST,"quantity",FILTER_VALIDATE_INT);
            echo $size;
            echo $quantity;
            switch($size){
                case"small":  $realprice=$price+0;break;
                case"medium": $realprice=$price+2000;break;
                case"large": $realprice=$price+4000;break;
                case"XL": $realprice=$price+6000;break;
                case"XXL":$realprice=$price+8000;break;
            }
            $realprice*=$quantity;
           echo $realprice;
            $originquantity=sizequantity($size,$clo_id);
            echo $originquantity;
        
            if($quantity>0){
            if($originquantity>$quantity || $originquantity==$quantity){
                $instock=$instock-$quantity;
                try{
                    
                    $con->query("UPDATE closet SET instock='$instock' WHERE clo_id='$item_id'");
                    sizeretri($size,$quantity,$clo_id);
                  $key=true;
                  ?>

    <script>
    if (<?php echo $key ?>) {
        alert("Add to cart Successfully!");

    }
    </script>
    <?php
                }catch(mysqli_sql_exception){
                    echo"fail to upadate";
                    
                }

            }else{  
                $key=false; 
               
                
                ?>
    <script>
    document.getElementById("insufficient").style.display = "block";
    </script>
    <?php
            }
        } 
        else{ 
            $key=false;
            ?>
    <script>
    document.getElementById("zero").style.display = "block";
    </script>
    <?php 

        } 
        if(!empty($_SESSION["user_id"])){
            $user_id=$_SESSION["user_id"];
          if($_SESSION["user_id"]!=null)  {
           
                if($key){  
            try{
                $_SESSION["order_id"]=$item_id;
                $user_id=$_SESSION["user_id"];
                $order_id= $_SESSION["order_id"];
                $con->query("INSERT INTO cart (clo_id,cus_id,quantity,size,orderprice) VALUES ('$order_id','$user_id','$quantity','$size','$realprice')");
               
              
                ?>

    <?php
               
            }catch(mysqli_sql_exception){ ?>
    <script>
    document.getElementById("unsuccess").style.display = "block";
    </script>

    <?php
                
            }
          }
            
        }
            
        }
    }
    else{ ?>
    <script>
    document.getElementById("size").style.display = "block";
    </script>
    <?php

    }}} ?>

    <script>
    const sizeButtons = document.querySelectorAll('[data-size]');

    sizeButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            const selectedSize = e.target.dataset.size;
            sizeButtons.forEach((btn) => {
                btn.classList.remove('bg-primary');
                btn.classList.remove('text-white');
                btn.classList.add('border-gray-200');
            });
            e.target.classList.add('bg-primary');
            e.target.classList.add('text-white')
            e.target.classList.remove('border-gray-200');
        });
    });

    document.getElementById("size-sm").addEventListener("click", function() {
        document.getElementById("price").innerHTML = <?php echo $price ?> + "KS";

    })
    document.getElementById("size-md").addEventListener("click", function() {
        document.getElementById("price").innerHTML = <?php echo $price +2000?> + "KS";
    })
    document.getElementById("size-lg").addEventListener("click", function() {
        document.getElementById("price").innerHTML = <?php echo $price +4000?> + "KS";
    })
    document.getElementById("size-xl").addEventListener("click", function() {
        document.getElementById("price").innerHTML = <?php echo $price + 6000?> + "KS";
    })
    document.getElementById("size-xxl").addEventListener("click", function() {
        document.getElementById("price").innerHTML = <?php echo $price +8000?> + "KS";
    })
    </script>
</body>

</html>