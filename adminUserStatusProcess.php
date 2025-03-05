<?php

include "connection.php";

$status_id = $_POST["s"];


if(empty($status_id)){
    echo "Please Enter User ID";
}else{
    // echo "Success";

    //search users from db using enter user id
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '$status_id' ");


    if(!$rs){
        echo("Error:" .Database::$connection->error);  
    }else{
        //if have a data
        $num = $rs->num_rows;

        //if have or not user
        if($num == 1){
            $d = $rs->fetch_assoc();

            //if user is a inactive -> active
            if($d['status_id'] == 0){
                Database::iud("UPDATE `user` SET `status_id` = '1' WHERE `id` = '$status_id' ");
                echo "Active";
                
            }elseif($d['status_id'] == 1){
                Database::iud("UPDATE `user` SET `status_id` = '0' WHERE `id` = '$status_id' ");
                echo "Inactive";
            }


        } else{
            echo "User Not Found";
        }
    }
}
?>