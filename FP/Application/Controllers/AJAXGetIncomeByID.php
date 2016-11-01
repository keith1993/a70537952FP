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
$IncomeID = $_POST["IncomeID"];


$a = new UserIncomeModel();
$jj = $a->getIncomeByIncomeID($IncomeID);

if ($jj instanceof UserIncomeObject) {
    $json = json_encode($jj);

    echo $json;



} else {
    echo "Income No Exists";
    // echo "Error!". mysql_error();
}