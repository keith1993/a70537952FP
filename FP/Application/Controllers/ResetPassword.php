<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09-10-16
 * Time: 12:45 PM
 */

spl_autoload_register(function ($class) {


    if (strpos($class, "Base") === 0) {
        require '../Framework/' . $class . '.php';
    } else if (strpos($class, "Model")) {
        require '../Models/' . $class . '.php';
    } else if (strpos($class, "Object")) {
        require '../Objects/' . $class . '.php';
    }else{
        require "../../Helper/".$class.".php";
    }

});

if(isset($_POST["newPassword"])){
    $email = $_POST["email"];
    $VerificationCode = $_POST["recoveryCode"];
    $newPassword = $_POST["newPassword"];
    $a= new UserModel();
    $a->ResetPassword($email,$VerificationCode,$newPassword);
    header("Location: ../../index.php");


}else{

    $email = $_POST["email"];
    $VerificationCode = $_POST["recoveryCode"];
    require "../Views/resetPassword.html";
}


