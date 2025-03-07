<?php

$stock_id = $_POST["s"];

include "connection.php";

Database::iud("DELETE FROM `watchlist` WHERE `stock_id` =  '".$stock_id."' ");

echo "done";

?>