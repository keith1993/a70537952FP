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
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$password = $_POST["password"];
$options = $_POST["options"];
$DOB = $_POST["DOB"];
$country = $_POST["country"];
$occupation = $_POST["occupation"];



$a = new UserModel();
$jj = $a->Register($firstName,$lastName,$password,$DOB,$options,$email,$country,$occupation);

 if($jj){
        echo "Registered";
    }else{
        echo "Error!". mysql_error();
    }

/*$FirstName, $LastName, $Password, $DOB, $Gender, $Email,
                             $Country, $LastLoginIP,$Occupation)*/