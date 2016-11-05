<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03-11-16
 * Time: 11:42 AM
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
if (isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {

    $userModel = new UserModel();
    $jj = $userModel->Login($_SESSION["email"], $_SESSION["password"], $_SERVER["REMOTE_ADDR"]);

    if ($jj instanceof UserObject) {
        /*********EXPENSE***********/
        $expenseModel= new UserExpenseModel();
        /********Today*************/
        $TodayExpenseRanking=$expenseModel->getTodayExpenseRanking();
        $UserTodayExpenseRankingObject = $expenseModel->getUserTodayExpenseRanking($_SESSION["id"]);
        /********Weekly*************/
        $WeeklyExpenseRanking=$expenseModel->getWeeklyExpenseRanking();
        $UserWeeklyExpenseRankingObject = $expenseModel->getUserWeeklyExpenseRanking($_SESSION["id"]);
        /********Monthly*************/
        $MonthlyExpenseRanking=$expenseModel->getMonthlyExpenseRanking();
        $UserMonthlyExpenseRankingObject = $expenseModel->getUserMonthlyExpenseRanking($_SESSION["id"]);


        /*********INCOME***********/
        $incomeModel= new UserIncomeModel();
        /********Today*************/
        $TodayIncomeRanking=$incomeModel->getTodayIncomeRanking();
        $UserTodayIncomeRankingObject = $incomeModel->getUserTodayIncomeRanking($_SESSION["id"]);
        /********Weekly*************/
        $WeeklyIncomeRanking=$incomeModel->getWeeklyIncomeRanking();
        $UserWeeklyIncomeRankingObject = $incomeModel->getUserWeeklyIncomeRanking($_SESSION["id"]);
        /********Monthly*************/
        $MonthlyIncomeRanking=$incomeModel->getMonthlyIncomeRanking();
        $UserMonthlyIncomeRankingObject = $incomeModel->getUserMonthlyIncomeRanking($_SESSION["id"]);

        require '../Views/Ranking.html';




    } else {
        echo "Error!" . mysql_error();
        session_unset();
        session_destroy();
        header("Location: ../../index.php");

    }

// echo "已登录";
} else {
    session_unset();
    session_destroy();
    header("Location: ../../index.php");
    // echo "未登录";
    //echo "请重新登录";
}