<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 10/5/2016
 * Time: 12:55 PM
 */

header('Content-Type: text/html; charset=utf-8');
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
session_start();
$Id = $_POST["Id"];
$email = $_POST["Email"];
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$gender = $_POST["Gender"];

$loginIP = $_SERVER["REMOTE_ADDR"];


$facebookEmail = $Id."@facebook.com";

$a = new UserModel();
$jj = $a->Login($facebookEmail,$Id,$loginIP);


if ($jj instanceof UserObject) {
    //echo "facebook user exists";

    //header('Location: ../Views/registerSuccess.html');
    $_SESSION["id"] = $jj->ID;
    $_SESSION["email"] = $jj->Email;
   $_SESSION["password"] = $Id;

    echo "LoginSuccess";
} else {

    $isRegister = $a->Register($firstName, $lastName, $Id, null, $gender, $facebookEmail, null,null);

    if ($isRegister) {
        //echo "Register success!" ;
       // echo "Application/Views/registerSuccess.html" ;


        echo "RegisterSuccess";



    } else {
        echo "Register Error!" ;
    }

}