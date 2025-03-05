<?php

include "connection.php";

include "./lib/Exception.php";
include "./lib/PHPMailer.php";
include "./lib/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;






$name = $_POST["n"];
$mobile = $_POST["m"];
$email = $_POST["e"];
$un = $_POST["u"];
$pw = $_POST["p"];
$co_pw = $_POST["cp"];


//set date
$d = new DateTime();
$tz = new DateTimeZone('Asia/Colombo');
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

//user input password to encode insert in password to databse
$encode_pw = password_hash($pw, PASSWORD_BCRYPT);

//set data manually
$code = uniqid();
$status = "0";

//check validation for input fields
if (empty($name)) {
    echo "Please Enter your Name";
} else if (strlen($name) > 30) {
    echo "Your Name should be less than 30 characters";
} else if (empty($mobile)) {
    echo "Please Enter Mobile";
} else if (strlen($mobile) > 13 || !preg_match("/^07[0,1,2,4,5,6,7,8]{1}[0-9]{7}$/", $mobile)) {
    echo "Invalid Mobile Number";
} else if (empty($email)) {
    echo "Please Enter your Email";
} else if (strlen($email) > 100) {
    echo "Your Email should be less than 100 characters";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address";
} else if (empty($un)) {
    echo "Please Enter Your Username";
} else if (strlen($un) > 20) {
    echo "Your Username should be less than 20 characters";
} else if (empty($pw)) {
    echo "Please Enter Your Password";
}else if (empty($co_pw)) {
    echo "Please Confirm Password";
} else if (strlen($pw) < 5 || strlen($pw) > 45) {
    echo "Your Password should be 5 - 45 characters";
}else if ($pw != $co_pw) {
    echo "Passwords do not match!";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `mobile` = '" . $mobile . "' OR `email` = '" . $email . "' OR `username` = '" . $un . "' ");
    $num = $rs->num_rows;
    //check if have result
    if ($num > 0) {
        echo ("Mobile OR Username OR email Already Registered");
    } else {

         // email code
         $mail = new PHPMailer;
         $mail->IsSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'meth.rathnayake2007@gmail.com'; //our mail
         $mail->Password = 'sqyijxhccwouogtk'; //app pw
         $mail->SMTPSecure = 'ssl';
         $mail->Port = 465;
         $mail->setFrom('OnlineStore@gmail.com', 'Online Store');
         $mail->addReplyTo($email);
         $mail->addAddress($email);
         $mail->isHTML(true);
         $mail->Subject = 'Email Verification - Online Store';
         $bodyContent = '<h1 style="color: #525252; text-align:center">Welcome To Online store ' .$un. '<br/></h1>
                            <h3 style="color: rgb(25,6,236); text-align:center">Your Verification Code Is - ' .$code. '</h3>'; //content variable
         $mail->Body    = $bodyContent;

            if (!$mail->send()){
                echo("Registration Failed");
            }



        Database::iud("INSERT INTO `user`(`name`,`mobile`,`email`,`username`,`password`,`code`,`date`,`status_id`)
        VALUES ('" . $name . "' , '" . $mobile . "' , '" . $email . "' , '" . $un . "' , '" . $encode_pw . "' , '" . $code . "' , '" . $date . "' , '" . $status . "')");

        echo ("Success");
    }
}
