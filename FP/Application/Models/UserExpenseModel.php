<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24-09-16
 * Time: 1:40 PM
 */



class UserExpenseModel extends BaseModel
{
    public function addExpense($UserID,$Expense_Amount,$Expense_Category,$Expense_Description)
    {
        $sql = "insert into user_expense (User_ID,Expense_Amount,Expense_Category,
            Expense_Description,Expense_EnterDate)
            values(:User_ID,:Expense_Amount,:Expense_Category,:Expense_Description,now());";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Expense_Amount", $Expense_Amount);
        $result->bindValue(":Expense_Category", $Expense_Category);
        $result->bindValue(":Expense_Description",$Expense_Description);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getExpenseByUserID($UserID)
    {
        $sql = "select * from user_expense where User_ID=:User_ID limit 0,100";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $expenseList =  new SplObjectStorage();
        foreach ($result as $key =>$value){
            $expense = new UserExpenseObject($value);
            $expenseList->attach($expense);
        }
        return $expenseList;
    }

    public function deleteExpenseByExpenseID($ExpenseID)
    {
        $sql = "delete from user_expense where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }


}