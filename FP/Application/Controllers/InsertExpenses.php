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
$expenseName = $_POST["expenseName"];
$expenseAmount = $_POST["expenseAmount"];
$expenseCategory = $_POST["expenseCategory"];
$expenseDescription = $_POST["expenseDescription"];

$a = new UserExpenseModel();
for($count=0;$count<count($expenseName);$count++){
    $amount = $expenseAmount[$count]==""?0:$expenseAmount[$count];
    $jj = $a->addExpense($_SESSION["id"],$expenseName[$count],$amount,$expenseCategory[$count],$expenseDescription[$count]);

}


 if($jj){
     header('Location: ../../index.php');
    }else{
        echo "Error!". mysql_error();
    }