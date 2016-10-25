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
session_start();

$ImageFile = $_FILES["fileUpload"];


$a = new UserModel();

$jj = $a->updateUserImage($_SESSION["id"],$ImageFile);

 if($jj){
    header("Location: UserProfile.php");
    }else{
        echo "Error!". mysql_error();
    }

/*$UserID, $Files*/