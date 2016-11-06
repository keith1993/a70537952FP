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
    } else {
        require "../../Helper/" . $class . ".php";
    }

});
session_start();
$incomeID = $_POST["incomeID"];

$a = new UserFixedIncomeModel();
$result = $a->deleteFixedIncomeByIncomeID($incomeID);
if($result){

    echo "deleteFixedIncomeSuccess";
}else{

    echo "deleteFixedIncomeFailed";
}