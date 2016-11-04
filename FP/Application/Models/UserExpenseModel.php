<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24-09-16
 * Time: 1:40 PM
 */



class UserExpenseModel extends BaseModel
{
    public function addExpense($UserID, $Expense_Name, $Expense_Amount, $Expense_Category, $Expense_Description)
    {
        $sql = "insert into user_expense (User_ID,Expense_Name,Expense_Amount,Expense_Category,
            Expense_Description,Expense_EnterDate)
            values(:User_ID,:Expense_Name,:Expense_Amount,:Expense_Category,:Expense_Description,now());";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Expense_Name", $Expense_Name);
        $result->bindValue(":Expense_Amount", $Expense_Amount);
        $result->bindValue(":Expense_Category", $Expense_Category);
        $result->bindValue(":Expense_Description", $Expense_Description);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getExpenseByUserID($UserID)
    {
        $sql = "select * from user_expense where User_ID=:User_ID order by Expense_EnterDate Desc";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $expenseList = new SplObjectStorage();
        foreach ($result as $key => $value) {
            $expense = new UserExpenseObject($value);
            $expenseList->attach($expense);
        }
        return $expenseList;
    }

    public function getExpenseByExpenseID($ExpenseID)
    {
        $sql = "select * from user_expense where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $result->execute();
        $result = $result->fetch();
        $Expense = new UserExpenseObject($result);
        return $Expense;
    }


    public function deleteExpenseByExpenseID($ExpenseID)
    {
        $sql = "delete from user_expense where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateExpenseByExpenseID($ExpenseID, $Expense_Name, $Expense_Amount, $Expense_Category, $Expense_Description,$ExpenseEnterDate)
    {
        $sql = "update user_expense set Expense_Name=:Expense_Name,Expense_Amount=:Expense_Amount,Expense_Category=:Expense_Category,
                Expense_Description=:Expense_Description,Expense_EnterDate=:ExpenseEnterDate where Expense_ID=:ExpenseID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":ExpenseID", $ExpenseID);
        $result->bindValue(":Expense_Name", $Expense_Name);
        $result->bindValue(":Expense_Amount", $Expense_Amount);
        $result->bindValue(":Expense_Category", $Expense_Category);
        $result->bindValue(":Expense_Description", $Expense_Description);
        $result->bindValue(":ExpenseEnterDate", $ExpenseEnterDate);
        $isSuccess = $result->execute();
        return $isSuccess;
    }



    public function getExpenseGroupByUserIDAndMonth($UserID,$Month)
    {
        $sql = "SELECT Expense_Category,SUM(Expense_Amount) as Expense_Amount FROM `user_expense` 
              where User_ID=:User_ID and MONTH(Expense_EnterDate)=:mon GROUP by Expense_Category ORDER BY Expense_Category ASC";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":mon", $Month);
        $result->execute();
        $result = $result->fetchAll();

        $expenseGroup = array();
        foreach ($result as $key => $value) {

            $expenseGroup[$value['Expense_Category']]=$value['Expense_Amount'];
        }


        return $expenseGroup;
    }

    public function getTodayExpenseGroupByUserID($UserID)
    {
        $sql = "SELECT Expense_Category,SUM(Expense_Amount) as Expense_Amount FROM `user_expense` where User_ID=:User_ID and Expense_EnterDate=CURDATE() GROUP by Expense_Category ORDER BY Expense_Category ASC";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();

        $expenseGroup = array();
        foreach ($result as $key => $value) {

            $expenseGroup[$value['Expense_Category']]=$value['Expense_Amount'];
        }


        return $expenseGroup;
    }




public function getTodayExpenseRanking()
{
    $sql = "select @rank:=@rank+1 as rank,p.User_ID,p.Total_Expense_Amount from(select @rank := 0)r,(select User_ID,SUM(Expense_Amount) as Total_Expense_Amount FROM `user_expense`
where Expense_EnterDate=CURDATE() GROUP by User_ID ORDER by Total_Expense_Amount desc limit 0,100)p";
    $result = self::$conn->prepare($sql);

    $result->execute();
    $result = $result->fetchAll();

    $TotalExpenseRanking = array();
    foreach ($result as $key => $value) {
        $object = new stdClass();
        $object->rank = $value['rank'];
        $object->User_ID = $value['User_ID'];
        $object->Total_Expense_Amount = $value['Total_Expense_Amount'];
        $TotalExpenseRanking[$value['User_ID']]=$object;
    }


    return $TotalExpenseRanking;
}




public function getUserTodayExpenseRanking($UserID)
{
    $sql = "select * from(select @rank:=@rank+1 as rank,p.User_ID,p.Total_Expense_Amount from(select @rank := 0)r,(select User_ID,SUM(Expense_Amount)
as Total_Expense_Amount FROM `user_expense` where Expense_EnterDate=CURDATE() GROUP by User_ID ORDER by Total_Expense_Amount desc limit 0,100)p)a where User_ID=:User_ID";
    $result = self::$conn->prepare($sql);
    $result->bindValue(":User_ID", $UserID);
    $result->execute();
    $result = $result->fetch();



        $object = new stdClass();
        $object->rank = $result['rank'];
        $object->User_ID = $result['User_ID'];
        $object->Total_Expense_Amount = $result['Total_Expense_Amount'];




    return $object;

}
}