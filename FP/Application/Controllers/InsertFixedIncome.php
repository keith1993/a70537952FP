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
$incomeName = $_POST["incomeName"];
$incomeAmount = $_POST["incomeAmount"];
$incomeDescription = $_POST["incomeDescription"];
$incomePayEvery = $_POST["incomePayEvery"];
$a = new UserFixedIncomeModel();
$jj = $a->addFixedIncome($_SESSION["id"],$incomeName,$incomeAmount,$incomeDescription,$incomePayEvery);

 if($jj){
     header("Location:ScheduleSetting.php");
    }else{
        echo "Error!". mysql_error();
    }