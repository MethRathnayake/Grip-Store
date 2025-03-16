<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];

$firstName = $_POST["f"];
$lastName = $_POST["l"];
$username = $_POST["u"];
$mobile = $_POST["m"];
$password = $_POST["p"];
$confirmPassword = $_POST["c"];
$address = $_POST["a"];
$city = $_POST["city"];  // Ensure the form field name is "city"
$postalCode = $_POST["po"];

if (empty($firstName)) {
    echo("Please Enter Your First Name");
} else if (empty($lastName)) {
    echo("Please Enter Your Last Name");
} elseif (empty($username)) {
    echo("Please Enter Your Username");
} else if (empty($mobile)) {
    echo("Please Enter Your Mobile");
} else if(strlen($firstName) > 15){
    echo "Your First Name Should be Less than 15 Characters";
} elseif(strlen($mobile) > 11){
    echo "Invalid Mobile Number";
} elseif(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)){
    echo "Not a Valid Mobile Number Format";
} elseif (!empty($password)) {  
    if (!(strlen($password) > 5 && strlen($password) < 30)) {  
        echo "Your Password Should be 5 - 30 Characters";
    } 
    if($password != $confirmPassword){
        echo "The passwords you entered do not match.";
    }
    $encode_pw = password_hash($password , PASSWORD_BCRYPT);

}
if (empty($address)){
    echo "Please Enter Your House address";
} elseif (strlen($address) < 5){
    echo "Your Address Should be more than 5 Characters";
} elseif (empty($city)){
    echo "Please Enter Your Nearest City";
} elseif (strlen($city) < 3){
    echo "Enter a Valid City";
} elseif (empty($postalCode)){
    echo "Please Enter Your Postal Code";
} elseif (!preg_match('/^\d{5,6}$/', $postalCode)) {
    echo "Please enter Valid Postal Code";
} else {

    if (!empty($password)) {  
        $q = "UPDATE `user` SET
                        `name` = '".$firstName."',
                        `mobile` = '".$mobile."',
                        `username` = '".$username."' ,
                        `password` = '".$encode_pw."' ,
                        `last_name` = '".$lastName."' ,
                        `postal_code` = '".$postalCode."' ,
                        `address` = '".$address."' ,
                        `city` = '".$city."' WHERE `id` = '".$user["id"]."' ";
    }else{
        $q = "UPDATE `user` SET
                        `name` = '".$firstName."',
                        `mobile` = '".$mobile."',
                        `username` = '".$username."' ,
                        `last_name` = '".$lastName."' ,
                        `postal_code` = '".$postalCode."' ,
                        `address` = '".$address."' ,
                        `city` = '".$city."' WHERE `id` = '".$user["id"]."' ";
    }

    
    
    Database::iud($q);

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."' ");
    $d = $rs->fetch_assoc();

    $_SESSION["u"] = $d;
    
    $profile = $d["pro_path"];

    if(!empty($_FILES["img"])){
        $path = "ProfileImg/" . uniqid() . ".png";
        move_uploaded_file($_FILES["img"]["tmp_name"], $path);
        Database::iud("UPDATE `user` SET `pro_path` = '".$path."' WHERE `id` = '".$user["id"]."' ");
        
        if(!empty($profile) && file_exists($profile)){
            unlink($profile);
        }
    }

    echo "success";
}
?>
