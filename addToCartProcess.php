<?php

$stock_id = $_POST["s"];
$qty = intval($_POST["q"]);

session_start();
$user = $_SESSION["u"];

include "connection.php";

$rs = Database::search("SELECT * FROM `cart` WHERE `stock_id` = '" . $stock_id . "' AND `user_id` = '" .$user["id"]. "' ");
$num = $rs->num_rows;
$d = $rs->fetch_assoc();

if ($num > 0) {

    $newQty = intval($d["cart_qty"]) + $qty;
    $q = "UPDATE `cart` SET `cart_qty` = '".$newQty."' WHERE `user_id` = '" .$user["id"]. "' ";
    Database::iud($q);
}else{

    $q = "INSERT INTO `cart` (`cart_qty`,`user_id`,`stock_id`) VALUES ('".$qty."','".$user["id"]."','".$stock_id."')";
    Database::iud($q);

}

echo "success";
