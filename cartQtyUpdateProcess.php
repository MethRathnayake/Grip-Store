<?php
//qty increment part
include "connection.php";

$cartID = $_POST["c"];
$qty = $_POST["q"];

// echo $qty;
// echo $cartID;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.stock_id = `stock`.stock_id 
                            WHERE `cart`.cart_id = '".$cartID."'");
    

    $num = $rs->num_rows;

    // echo $num;

    //check avaliable cart or not in login user
    if ($num > 0) {
        //cart available
        $d = $rs->fetch_assoc();

        if($d["qty"] >= $qty){
            Database::iud("UPDATE `cart` SET `cart_qty` = '".$qty."' WHERE `cart_id` = '".$cartID."' ");
            echo("success");
        }else{
            echo "Sorry Your Selected QTY over with our stock";
        }


    }else{
        //no cart found
    }

?>