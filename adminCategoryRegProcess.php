<?php 

include "connection.php";

$category = $_POST["c"];
// echo "new size is: ".$category;

if(empty($category)){
    echo "You Must be First Enter the category name";
}elseif(strlen($category) < 2 || strlen($category) >20){
    echo "Your Category name to be less than 20 characters";

}else{

    $rs =  Database::search("SELECT * FROM `category` WHERE `category_name` = '$category'");
    $num = $rs->num_rows;

        if($num > 0){
            echo "DataHave";
        }else{
            Database::iud("INSERT INTO `category` (`category_name`) VALUES ('".$category."')");
            echo "sucess";
        }


    
}

?>