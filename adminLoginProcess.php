<?php


include "connection.php";

session_start(); 

$email = $_POST["e"];
$password = $_POST["p"];

// echo ($email);
// echo ($password);

if (empty($email)) {
    echo ("Please Enter your Email Address");
} elseif (strlen($email) > 100) {
    echo ("Your Email Address id too long");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please Enter a valid Email Format";
} elseif (empty($password)) {
    echo "Please Enter Your Password";
} elseif (strlen($password) < 5 || strlen($password) > 20) {
    echo "Your Password should be 5-20 Characters";
} else {
    
    $rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "' ");
    $num = $rs->num_rows;

    //in have or not admin
    if ($num == 1) {
        //get data row
        $d = $rs->fetch_assoc();

        //check active admin or not
        if ($d['status_id'] == 1) {

            //check admin type
            if ($d['admin_type'] == 1) {
                $_SESSION["a"]= $d;
                echo "Success";
            } else {
                echo "you are not an Admin";
            }
        } else {
            echo "Your Account has been Deactivated";
        }
    } else {
        echo "Invalid Email or Password";
    }
}
