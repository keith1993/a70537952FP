<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:24 PM
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

$email = $_POST["email"];
$password = $_POST["password"];
$loginIP = $_SERVER["REMOTE_ADDR"];

$a = new UserModel();
$jj = $a->Login($email,$password,$loginIP);

 if($jj instanceof UserObject){
      header('Location: ../Views/registerSuccess.html');
    }else{
        echo "Error!". mysql_error();
    }