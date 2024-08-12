

<?php 
    
    include("connection.php");
    include("functions.php");


    if(isset($_GET["save"])){
       ob_start();
        $dec=$_GET["dec"];
        $his_id=$_GET["his_id"];
        $quantity=$_GET["quantity"];
        $instock=$_GET["instock"];
        $clo_id=$_GET["clo_id"];
echo $clo_id;
        echo $dec ."<br>";
        echo $his_id;
        echo $quantity ."<br>";
        echo $instock;
        
        $upinstock=$quantity+$instock;

       switch($dec){
        case"Cancel": update1($dec,$his_id,0);
                    update2($upinstock,$clo_id);break;

        case"Pending":  update3($dec,$his_id)  ;break;
        case"Accept":  update3($dec,$his_id)  ;break;

       }
       
      

       header("Location:accept.php");
        ob_end_flush();
    }
    
    
    ?>