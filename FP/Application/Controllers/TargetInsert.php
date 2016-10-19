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
$Target_Name = $_POST["Target_Name"];
$Target_Amount = $_POST["Target_Amount"];
$Target_Days = $_POST["Target_Days"];

$a = new UserTargetModel();
$jj = $a->addTarget("007",$Target_Name,$Target_Amount,$Target_Days);
/*
 if($jj instanceof UserTargetObject){

     echo "Insert Target Success";
    }else{
        echo "Error!". mysql_error();
    }
	*/
	/*$UserID,$Target_Name,$Target_Amount,$Target_Days*/
?>