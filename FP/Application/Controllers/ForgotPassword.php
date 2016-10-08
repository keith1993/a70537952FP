<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08-10-16
 * Time: 9:16 PM
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


$a  = new UserModel();

$Email = $_POST["Email"];

$user = $a->getUserByEmail($Email);

if($user instanceof UserObject) {

    $VerificationCode = $a->setVerificationCode($user->Email);
    $Email = new EmailTo("FP","Password Reset Verification",$user->Email,$user->FirstName,"$VerificationCode");
    if($Email->send()){

        echo "EmailExist";
    }



}else{

    echo "EmailNoExist";
}