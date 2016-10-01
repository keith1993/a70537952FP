<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01-10-16
 * Time: 9:36 AM
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

$isExist = $a->isEmailExist($Email);

if($isExist) {
    echo "Email exist";

}else{

    echo "Email no exist";
}

?>