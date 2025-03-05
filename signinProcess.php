<?php
include "connection.php";

session_start(); 

$um = $_POST["u"];
$pw = $_POST["p"];
$rm = $_POST["r"];

// echo($pw);
// echo($rm);
// echo($um);

if(empty($um)){
    echo("Please Enter your Username");
}elseif(empty($pw)){
    echo("Please Enter your Password");
}else {
    $sq = "SELECT * FROM `user` WHERE `username` = '".$um."' ";
    $result = Database ::search($sq);
    $user = $result->fetch_assoc();

    if ($result->num_rows == 1) {
        //get db encripted password
        $db_encript_pw = $user['password'];


            if ($user['status_id'] == 1){

                $_SESSION["u"]= $user;

                    //check input password & db encripted password
                if(password_verify($pw, $db_encript_pw)){
                    echo("success");

                        if ($rm == "true") {
                            
                            setcookie("username",$um , time()+ (60*60*24*365));   //save username
                            setcookie("password" , $pw ,time() + (60*60*24*365)); //save password

                        } else {
                           
                            setcookie("username" , "" , -1);
                            setcookie("password" , "" , -1);

                        }
                        
                }else{
                    echo("Invalid Password");
                }

            } else{
                echo "Your Account has been Deactivated";
            }

           
            
    }else{
        echo "Your Username Not Found, Please Check your Credentials";

    }

}

?>