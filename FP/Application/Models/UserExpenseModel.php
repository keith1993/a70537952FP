<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24-09-16
 * Time: 1:40 PM
 */



class UserExpenseModel extends BaseModel
{
    public function addExpense($UserID,$Expense_Name,$Expense_Amount,$Expense_Category,$Expense_Description)
    {
        $sql = "insert into user_expense (User_ID,Expense_Name,Expense_Amount,Expense_Category,
            Expense_Description,Expense_EnterDate)
            values(:User_ID,:Expense_Name,:Expense_Amount,:Expense_Category,:Expense_Description,now());";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Expense_Name", $Expense_Name);
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

    public function updateIncomeByIncomeID($ExpenseID,$Expense_Name,$Expense_Amount,$Expense_Category,$Expense_Description)
    {
        $sql = "update user_expense set Expense_Name=:Expense_Name,Expense_Amount=:Expense_Amount,Expense_Category=:Expense_Category,
                Expense_Description=:Expense_Description where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $result->bindValue(":Expense_Name", $Expense_Name);
        $result->bindValue(":Expense_Amount", $Expense_Amount);
        $result->bindValue(":Expense_Category", $Expense_Category);
        $result->bindValue(":Expense_Description",$Expense_Description);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getExpenseJSONbyUserID($UserID)
    {
        $sql = "select * from user_expense where User_ID=:User_ID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();

        $data = array();
        foreach ($result as $key =>$value){
            $expense = new UserExpenseObject($value);
            array_push($data,(object)array(
                'Expense Name' => $expense->Expense_Name,
                'Expense Amount' => $expense->Expense_Amount,
                'Expense Category' => $expense->Expense_Category,
                'Expense Description' =>$expense->Expense_Description,
                'Expense Enter Date' => $expense->Expense_EnterDate,
            )) ;
        }
        $json = json_encode($data);
        return $json;
    }

    public function getExpenseColumnJSON()
    {


        $data = array(
            (object)array(
                'name' => 'ExpenseName',
                'title' => 'Expense Name',
                'type' => 'text',

            ),
            (object)array(
                'name' => 'ExpenseAmount',
                'title' => 'Expense Amount',
                'type' => 'number',

            ),
            (object)array(
                'name' => 'ExpenseCategory',
                'title' => 'Expense Category',
                'type' => 'text',

            ),
            (object)array(
                'name' => 'ExpenseDescription',
                'title' => 'Expense Description',
                'type' => 'text',

            ),
            (object)array(
                'name' => 'ExpenseEnterDate',
                'title' => 'Expense Enter Date',
                'type' => 'date',
                'formatString' => 'DD MMM YYYY',
            ),
        );

        $json = json_encode($data);
        return $json;
    }


}