<?php
include "connection.php";
session_start();
$user = intval($_SESSION["u"]);
$stock_id = $_POST["s"];

$q = "SELECT * FROM `watchlist` WHERE `user_id` = '".$user."' AND `stock_id` = '".$stock_id."' ";
$rs = Database::search($q);
$num =  $rs->num_rows;

    if ($num > 0) {
        echo "already have";
    }else{
        Database::iud("INSERT INTO `watchlist` (`user_id` , `stock_id`) VALUES ('".$user."' , '".$stock_id."') ");
        echo "done";
    }







?>
