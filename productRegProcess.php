<?php  

include "connection.php";

$productName = $_POST["p"];
$BrandName = $_POST["b"];
$categoryName = $_POST["cat"];
$product_type = $_POST["s"];
$color = $_POST["c"];
$des = $_POST["d"];
// $imgPath = $_FILES["i"];

// echo $productName;
// echo $BrandName;
// echo $categoryName;
// echo $size;
// echo $color;
// echo $des;
// echo $imgPath;

if(empty($productName)){
    echo("Please Enter Your New Product Name");
}else if(empty($des)){
    echo("Please Enter Your Product Description");
}else if(empty($_FILES["i"])){
    echo("Please Include Your Product Image");
}else{


//if have product in DB using product name
$rs = Database::search("SELECT * FROM `product` WHERE `product_name` = '".$productName."' ");
$num = $rs->num_rows;

//if have data or not
if ($num > 0) {
    echo("DataHave");
} else {
        $path = "ProductImg//" .uniqid(). ".png"; //set file path & uniq name
        move_uploaded_file($_FILES["i"]["tmp_name"], $path); //,ove file to our path



        //status id eka watenne nh work bench eken
        Database::iud("INSERT INTO `product` (`product_name` , `description`,`path`,`brand_id`,`category_id`,`product_type_id`,`color_id`)
                            VALUES('".$productName."' ,'".$des."' ,'".$path."' ,'".$BrandName."' ,'".$categoryName."' ,'".$product_type."' , '".$color."'   )");

    echo("success");

}


}
?>