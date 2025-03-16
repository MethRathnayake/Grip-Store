<?php

$condition = $_POST["c"];

session_start();
include "connection.php";

//get login user
$user = $_SESSION["u"];

$q1= "SELECT * FROM `user`"; 

$rs1 = Database::search($q1);
$d1 = $rs1->fetch_assoc();


if (
    (!empty($d1["address"])) &&  (!empty($d1["city"])) && (!empty($d1["postal_code"]))
) {
    
    if ($user["status_id"] == 1) {
        $q2 = "SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.stock_id = `stock`.stock_id WHERE `cart`.user_id = '".$user["id"]."' " ;
        $rs2 = Database::search($q2);
        $num2 = $rs2->num_rows;
        for ($i=0; $i < $num2; $i++) { 
            $d2 = $rs2->fetch_assoc();
            
        }
        # code...
    } else{
        echo "user_error";
    }
    
   


} else {
    echo "location_error";
}


?>