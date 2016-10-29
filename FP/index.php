<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07-10-16
 * Time: 3:48 PM
 */

spl_autoload_register(function ($class) {


    if (strpos($class, "Base") === 0) {
        require 'Application/Framework/' . $class . '.php';
    } else if (strpos($class, "Model")) {
        require 'Application/Models/' . $class . '.php';
    } else if (strpos($class, "Object")) {
        require 'Application/Objects/' . $class . '.php';
    } else {
        require "Helper/" . $class . ".php";
    }

});
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {

    $a = new UserModel();
    $jj = $a->Login($_SESSION["email"], $_SESSION["password"], $_SERVER["REMOTE_ADDR"]);

    if ($jj instanceof UserObject) {
        $expensesModel = new  UserExpenseModel();
        $incomeModel = new UserIncomeModel();
        $expenseList = $expensesModel->getExpenseByUserID($jj->ID);
        $incomeList = $incomeModel->getIncomeByUserID($jj->ID);
       $expenseGroup = $expensesModel->getExpenseGroupByUserIDAndMonth($jj->ID, date('m'));
        $incomeGroup = $incomeModel->getIncomeGroupByUserIDAndMonth($jj->ID, date('m'));
        $totalIncome = 0;
        $totalExpense = 0;


        foreach ($expenseGroup as $k =>$v){$totalExpense+=$v;}
        foreach ($incomeGroup as $k =>$v){$totalIncome+=$v;}




      require 'Application/Views/overviewDemo.html';




} else {
    echo "Error!" . mysql_error();
    session_unset();
    session_destroy();
    require 'Application/Views/index.html';
}

// echo "已登录";
} else {
    session_unset();
    session_destroy();
    require 'Application/Views/index.html';
    // echo "未登录";
    //echo "请重新登录";
}