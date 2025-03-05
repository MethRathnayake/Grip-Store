<?php 

include "connection.php";

$color = $_POST["c"];
// echo "new size is: ".$color;

if(empty($color)){
    echo "You Must be First Enter the Color name";
}elseif(strlen($color) < 2 || strlen($color) >20){
    echo "Your Color name to be less than 20 characters";

}else{

    $rs =  Database::search("SELECT * FROM `color` WHERE `color_name` = '$color'");
    $num = $rs->num_rows;

        if($num > 0){
            echo "DataHave";
        }else{
            Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$color."')");
            echo "sucess";
        }


    
}

?>