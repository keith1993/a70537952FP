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

$incomeName = $_POST["incomeName"];
$incomeAmount = $_POST["incomeAmount"];
$incomeDescription = $_POST["incomeDescription"];

$a = new UserIncomeModel();
$jj = $a->addIncome("1",$incomeName,$incomeAmount,$incomeDescription);

 if($jj){
 	echo "Income Inserted";
    }else{
        echo "Error!". mysql_error();
    }