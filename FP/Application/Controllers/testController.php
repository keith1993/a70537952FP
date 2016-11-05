<?php


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
/*
 * 测试使用

1.Comment掉Auto Generate Expense and Income的coding，然后执行 Auto Generate User 的code一次

2.去database看，是从哪里一个ID开始自动生成income和expense，然后那个ID替换掉Auto Generate Expense and Income 中的$StartUserID的value。

3.Comment掉Auto Generate User的coding，然后执行 Auto Generate Expense and Income 的code一次

4.完成
*/

/*********************************************Auto Generate User*********************************/
/*
$lastNameArr = array("BROOKS","HARRIS","ALLEN","MARTIN","ANDERSON","MILLER","WALKER","EDWARDS","NELSON","TAYLOR");
$firstNameArr = array("James","RICHARD","DAVID","LISA","CYNTHIA","MARY","LAURA","SUSAN","MICHAEL","MARK");
$genderArr  = array("Male","Female");
$userModel = new UserModel();
for($a=1;$a<=10;$a++){
    $firstName = $firstNameArr[rand(0,count($firstNameArr)-1)];
    $lastName = $lastNameArr[rand(0,count($lastNameArr)-1)];
    $password = "123";
    $date = new DateTime();
    $DOB = $date->format('d-m-Y');
    $gender = $genderArr[rand(0,count($genderArr)-1)];
    $email =$firstName.$lastName.rand(0,100000)."@testing.com";
    $country = "Malaysia";
    $occupation = "Student";
    $userModel->Register($firstName,$lastName,$password,$DOB,$gender,$email,$country,$occupation);
}

*/

/******************************************Auto Generate Expense and Income****************************/
/*
$StartUserID = 50;
$EndUserID = $StartUserID+9;

$expenseAmountArr = array(1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000);
$incomeAmountArr = array(1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000);
$expenseCategoryArr = array("Debts", "Entertainment", "Fixed expenses", "Food & beverage", "Others", "Transport");
$userExpenseModel = new UserExpenseModel();
$userIncomeModel = new UserIncomeModel();

while ($StartUserID <= $EndUserID) {
    $count = 0;
    $addTimes = 5;

    while ($count < $addTimes) {
        $expenseAmount = $expenseAmountArr[rand(0, count($expenseAmountArr) - 1)];
        $expenseCategory = $expenseCategoryArr[rand(0, count($expenseCategoryArr) - 1)];
        $userExpenseModel->addExpense($StartUserID, "testExpense" . $StartUserID, $expenseAmount, $expenseCategory, "test");

        $incomeAmount = $incomeAmountArr[rand(0, count($incomeAmountArr) - 1)];
        $userIncomeModel->addIncome($StartUserID, "testIncome" . $StartUserID, $incomeAmount, "");
        $count+=1;
    }
    $StartUserID += 1;
}
*/