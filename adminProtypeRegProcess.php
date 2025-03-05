<?php 

include "connection.php";

$product_type = $_POST["p"];
// echo "new size is: ".$size;

if(empty($product_type)){
    echo "You Must be First Enter the Product type";
}elseif(strlen($product_type) < 2 || strlen($product_type) >20){
    echo "Your Product type has to be less than 20 characters";

}else{

    $rs =  Database::search("SELECT * FROM `product_type` WHERE `product_type` = '$product_type'");
    $num = $rs->num_rows;

        if($num > 0){
            echo "DataHave";
        }else{
            Database::iud("INSERT INTO `product_type` (`product_type`) VALUES ('".$product_type."')");
            echo "sucess";
        }


    
}


?>