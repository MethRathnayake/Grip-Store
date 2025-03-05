<?php 

include "connection.php";

$brand = $_POST["b"];
// echo "new brand is: ".$brand;

if(empty($brand)){
    echo "You Must be First Enter the Brand name";
}elseif(strlen($brand) < 2 || strlen($brand) >20){
    echo "Your Brand name to be less than 20 characters";

}else{

    $rs =  Database::search("SELECT * FROM `brand` WHERE `brand_name` = '$brand'");
    $num = $rs->num_rows;

        if($num > 0){
            echo "DataHave";
        }else{
            Database::iud("INSERT INTO `brand` (`brand_name`) VALUES ('".$brand."')");
            echo "sucess";
        }


    
}


?>