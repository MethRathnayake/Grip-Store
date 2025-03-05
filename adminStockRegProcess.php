<?php

include "connection.php";

$product = $_POST["p"];
$price = $_POST["rs"];
$qty = $_POST["q"];

// echo($price);
// echo($product);
// echo($qty);

if(empty($qty)){
    echo "Please Enter Your Product QTY";
} else if(!is_numeric($qty)){
    echo "Only Include numbers for QTY";
}else if(empty($price)){
    echo "Please Enter Your Product Unit Price";
} else if(!is_numeric($price)){
    echo "Only Include numbers for Unite price";
} else if(strlen($price)<3 || strlen($price) > 6){
    echo "Please Enter Valid Unite Price";
}else{

    //search product from stock table
   $rs =  Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product."' ");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

        if($num ==1){
            //already have an stock, then update there stock
            $newQty = $d["qty"] + $qty;

            Database::iud("UPDATE `stock` SET `qty` = '".$newQty."', `price` = '".$price."' WHERE `stock_id` = '".$d["stock_id"]."' ");
            echo "update";


        } else{
            //already don't have an stock, then insert there stock
            Database::iud("INSERT INTO `stock` (`price` , `qty` , `product_id`) VALUES ('".$price."' , '".$qty."' , '".$product."')");
            echo "insert";
        }
   



}





?>