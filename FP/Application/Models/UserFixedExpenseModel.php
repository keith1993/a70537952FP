<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06-11-16
 * Time: 2:30 PM
 */
class UserFixedExpenseModel extends BaseModel
{
    public function addFixedExpense($UserID, $Expense_Name, $Expense_Amount, $Expense_Category, $Expense_Description,$Expense_PayEvery)
    {
        $sql = "insert into user_fixed_expense (User_ID,Expense_Name,Expense_Amount,Expense_Category,
            Expense_Description,Expense_EnterDate,Expense_PayEvery)
            values(:User_ID,:Expense_Name,:Expense_Amount,:Expense_Category,:Expense_Description,now(),:Expense_PayEvery);";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Expense_Name", $Expense_Name);
        $result->bindValue(":Expense_Amount", $Expense_Amount);
        $result->bindValue(":Expense_Category", $Expense_Category);
        $result->bindValue(":Expense_Description", $Expense_Description);
        $result->bindValue(":Expense_PayEvery", $Expense_PayEvery);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getFixedExpenseByUserID($UserID)
    {
        $sql = "select * from user_fixed_expense where User_ID=:User_ID order by Expense_EnterDate Desc";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $FixedExpenseList = new SplObjectStorage();
        foreach ($result as $key => $value) {
            $expense = new UserFixedExpenseObject($value);
            $FixedExpenseList->attach($expense);
        }
        return $FixedExpenseList;
    }

    public function getFixedExpenseByExpenseID($ExpenseID)
    {
        $sql = "select * from user_fixed_expense where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $result->execute();
        $result = $result->fetch();
        $FixedExpense = new UserFixedExpenseObject($result);
        return $FixedExpense;
    }


    public function deleteFixedExpenseByExpenseID($ExpenseID)
    {
        $sql = "delete from user_fixed_expense where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateFixedExpenseByExpenseID($ExpenseID, $Expense_Name, $Expense_Amount, $Expense_Category, $Expense_Description,$Expense_PayEvery)
    {
        $sql = "update user_fixed_expense set Expense_Name=:Expense_Name,Expense_Amount=:Expense_Amount,Expense_Category=:Expense_Category,
                Expense_Description=:Expense_Description,Expense_EnterDate=now(),Expense_PayEvery=:Expense_PayEvery where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $result->bindValue(":Expense_Name", $Expense_Name);
        $result->bindValue(":Expense_Amount", $Expense_Amount);
        $result->bindValue(":Expense_Category", $Expense_Category);
        $result->bindValue(":Expense_Description", $Expense_Description);
        $result->bindValue(":Expense_PayEvery", $Expense_PayEvery);
        $isSuccess = $result->execute();
        return $isSuccess;
    }
}