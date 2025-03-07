<?php

include "connection.php";

$cartID = $_POST["c"];

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '".$cartID."' ");
echo "This Product Remove From your Cart!"


?>