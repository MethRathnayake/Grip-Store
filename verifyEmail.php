<?php

include "connection.php";

$code = $_POST["c"];
$status = "1";

if (empty($code)){
    echo("Please Enter Your Verification Code");
} else{
   $rs =  Database :: search("SELECT * FROM `user` WHERE `code` = '".$code."'   ");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();


    if($num > 0){
        $id = $d["id"];
        Database::iud("UPDATE `user` SET `status_id` = '".$status."' WHERE `id` = '".$id."';");

        echo("Success");

    } else{
        echo("Invalid Verification Code");
    }
}

?>