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
    <title>Detail</title>

    <!-- flowbite -->
    <link rel="stylesheet" href="../../node_modules/flowbite/dist/flowbite.min.css">
    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>

    <!-- tailwind -->
    <link href="../output.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/details.css">

    <!-- alpine -->
    <script src="../../public/script.js"></script>

    <style>
    .test {
        border: 1px solid red;
    }

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

    .img-thumnail-scroll {
        display: flex;
        overflow-x: auto;
    }

    .img-thumnail-scroll>img {
        width: 100px;
        height: 100px;
    }

    .img-btn-left {
        position: absolute;
        left: 0%;
        top: 50%;
        transform: translateY(50%);
        color: white;
        padding: 10px;
    }

    .img-btn-right {
        position: absolute;
        right: 0%;
        top: 50%;
        transform: translateY(50%);
        color: white;
        padding: 10px;
    }

    .big-img {
        min-width: 300px;
        max-width: 300px;
    }

    .text-box {
        padding-left: 30px;
        padding-rigth: 30px;
    }
    .img-box{
        padding-left: 5px;
        padding-rigth: 5px;
    }

    @media (min-width: 640px) {
        .img-box{
        min-width:700px;
        max-width:700px;
        padding-left: 0px;
        padding-rigth: 0px;
    }
        .text-box {
            padding-left:0px ;
            padding-rigth: 0px ;
        }

        .big-img {
            min-width: 600px;
            max-width: 600px;
        }
    }

    /* Hide scrollbar for Chrome, Safari, and Edge */
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }
    </style>
</head>

<body>

    <div class="min-w-full min-h-screen flex justify-center items-center ">
        <?php 
   $item_id=$_GET["item_id"];
  
  
   $result=$con->query("SELECT * FROM closet WHERE clo_id='$item_id' ");
   if(!empty($result)&& $result->num_rows>0){
    if($row=$result->fetch_assoc()){ 
        $clo_id=$row["clo_id"];
    $price=$row["price"];
      $instock=$row["instock"];
        ?>
        <!-- image -->
        <form action=" <?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

            <div class="font-sans tracking-wide max-lg:max-w-2xl mx-auto ">

                <div class="grid items-start grid-cols-1 lg:grid-cols-2 sm:w-0 mt-8 mb-8" style='gap:80px'>
                    <div class="space-y-4 img-box   text-center " style=''>
                        <!-- Carousel Container -->
                        <div class="relative">
                            <!-- Images -->
                            <div id="carousel"
                                class="bg-gray-100 mx-auto big-img rounded-md flex justify-center items-center overflow-hidden  "
                                style='min-height:600px; max-height:600px; padding:45px;'>
                                <?php  $result1=$con->query("SELECT * FROM closet_img where clo_id='$item_id'");
                            if(!empty($result1)&& $result1->num_rows>0){
                                while($row1=$result1->fetch_assoc()){ ?>
                                <img src="data:image/jepg;base64,<?php echo base64_encode($row1["img"]) ?>"
                                    alt="Product" class=" w-full h-full object-fill object-top " />
                                <?php     }}
                               ?>


                            </div>


                            <!-- Previous Button -->
                            <button type='button' id="prevBtn"
                                class="img-btn-left rounded-full cursor-pointer  bg-white border border-primary ">
                                <svg class='w-4 h-4 text-primary ' fill="currentColor" version="1.1" baseProfile="tiny"
                                    id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;"
                                    xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" viewBox="0 0 42 42"
                                    xml:space="preserve" transform="matrix(-1, 0, 0, 1, 0, 0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <polygon fill-rule="evenodd"
                                            points="13.933,1 34,21.068 14.431,40.637 9.498,35.704 24.136,21.068 9,5.933 ">
                                        </polygon>
                                    </g>
                                </svg>
                            </button>

                            <!-- Next Button -->
                            <button type='button' id="nextBtn"
                                class="img-btn-right bg-white border border-primary  rounded-full ">
                                <svg class='w-4 h-4 text-primary' fill="currentColor" version="1.1" baseProfile="tiny"
                                    id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;"
                                    xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" viewBox="0 0 42 42"
                                    xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <polygon fill-rule="evenodd"
                                            points="13.933,1 34,21.068 14.431,40.637 9.498,35.704 24.136,21.068 9,5.933 ">
                                        </polygon>
                                    </g>
                                </svg>
                            </button>
                        </div>

                        <!-- Thumbnails -->
                        <div class="img-thumnail-scroll gap-5 mt-4 overflow-auto">
                            <?php  $result1=$con->query("SELECT * FROM closet_img where clo_id='$item_id'");
                            if(!empty($result1)&& $result1->num_rows>0){
                                while($row1=$result1->fetch_assoc()){ ?>
                            <img src="data:image/jepg;base64,<?php echo base64_encode($row1["img"]) ?>" alt="Product"
                                style='min-width:100px; max-width:100px; min-height:110px; min-height:110px;'
                                class="bg-gray-100 p-2 rounded-md cursor-pointer thumbnail" />
                            <?php     }}
                               ?>


                        </div>
                    </div>
                    <div class="w-full  text-box">
                        <div>
                            <h2 class="text-2xl font-extrabold text-gray-800"> <?php echo $row["productname"] ?></h2>
                            <!-- <h2 class="text-2xl font-extrabold text-gray-800"></h2> -->
                            <p class="text-sm text-gray-600 mt-2"><?php echo $row["type"]?></p>
                        </div>

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
                                    onclick='document.getElementById("price").innerHTML = <?php echo $price ?>+"KS"' ;
                                    class="w-10 h-10 border  hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="SM">SM</label>
                                <?php   }
                               
                       if($medium>0) {  ?>
                                <label for="medium" id="size-md"
                                    onclick='document.getElementById("price").innerHTML = <?php echo $price+2000?>+"KS"'
                                    ;
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="MD">MD</label>
                                <?php   }   
                    if($large>0)   { ?>
                                <label for="large" id="size-lg"
                                    onclick='document.getElementById("price").innerHTML = <?php echo $price +4000?>+"KS"'
                                    ;
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="LG">LG </label>
                                <?php    } 
                if($XL>0){ ?>
                                <label for="XL" id="size-xl"
                                    onclick='document.getElementById("price").innerHTML = <?php echo $price +6000?>+"KS"'
                                    ;
                                    class="w-10 h-10 border hover:border-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
                                    data-size="XL"> XL</label>
                                <?Php      } 
          if($XXL>0){ ?>
                                <label for="XXL" id="size-xxl"
                                    onclick='document.getElementById("price").innerHTML = <?php echo $price +8000?>+"KS"'
                                    ;
                                    class="w-10 h-10 border hover:bor der-blue-700 font-semibold text-sm rounded-lg flex items-center justify-center shrink-0"
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
                            <!-- colors -->
                            <div class="color mt-8">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Available Colors</h3>
                                <div class='mt-4'>
                                    <?php 
                        $colors = json_decode($row['color']);

                        foreach ($colors as $color) { ?>
                                    <input type="radio" value="<?php echo $color?>" name="color" required
                                        style='width: 30px; height: 30px; border-radius:50%; background-color:<?php echo $color;?>'>
                                    <?php      }?>
                                </div>
                            </div>

                        </div>
                        <div class="mt-8 " class=" max-w-xs mx-auto">
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

                        <div class="gap-7 space-y-4 mt-10">
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
                                <p class="text-base text-gray-700 mt-4">
                                    <?php  echo $row["productdesc"]?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </form>

        <?php   }}
  
 
  ?>



    </div>


</body>
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
</script>
<script>
const carousel = document.getElementById('carousel');
const images = carousel.getElementsByTagName('img');
const thumbnails = document.querySelectorAll('.thumbnail');
let currentIndex = 0;

// Function to show the current image in the carousel
function showImage(index) {
    for (let i = 0; i < images.length; i++) {
        images[i].classList.add('hidden');
    }
    images[index].classList.remove('hidden');
}

// Event listeners for next/prev buttons
document.getElementById('nextBtn').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % images.length;
    showImage(currentIndex);
});

document.getElementById('prevBtn').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage(currentIndex);
});

// Event listeners for thumbnails
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        currentIndex = index;
        showImage(index);
    });
});

// Initially show the first image
showImage(currentIndex);
</script>


</html>
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
            $color=$_POST["color"];
            $size=filter_input(INPUT_POST,"size",FILTER_SANITIZE_SPECIAL_CHARS);
                if(isset($size)){
            $quantity=filter_input(INPUT_POST,"quantity",FILTER_VALIDATE_INT);]
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
                $con->query("INSERT INTO cart (clo_id,cus_id,quantity,size,orderprice,cart_color) VALUES ('$order_id','$user_id','$quantity','$size','$realprice','$color')");
               
              
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