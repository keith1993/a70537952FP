<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 10/5/2016
 * Time: 12:55 PM
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


$email = $_POST["Email"];
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$gender = $_POST["Gender"];


$a = new UserModel();
$jj = $a->getUserByEmail($email);


if ($jj instanceof UserObject) {
    echo "facebook user exists";
    //header('Location: ../Views/registerSuccess.html');
} else {

    $isRegister = $a->Register($firstName, $lastName, "", "", $gender, $email, "", "");

    if ($isRegister) {

            header('Location: ../Views/registerSuccess.html');


    } else {
        echo "Register Error!" ;
    }
    // echo "Error!". mysql_error();
}