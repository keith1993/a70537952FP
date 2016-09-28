<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:05 PM
 */
class UserIncomeModel extends  BaseModel
{
    public function addIncome($UserID,$Income_Amount,$Income_Description)
    {
        $sql = "insert into user_income (User_ID,Income_Amount,
            Income_Description,Income_EnterDate)
            values(:User_ID,:Income_Amount,:Income_Description,now());";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Income_Amount", $Income_Amount);
        $result->bindValue(":Income_Description",$Income_Description);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getIncomeByUserID($UserID)
    {
        $sql = "select * from user_income where User_ID=:User_ID limit 0,100";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $incomeList =  new SplObjectStorage();
        foreach ($result as $key =>$value){
            $income = new UserIncomeObject($value);
            $incomeList->attach($income);
        }
        return $incomeList;
    }

    public function deleteIncomeByIncomeID($IncomeID)
    {
        $sql = "delete from user_income where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateIncomeByIncomeID($IncomeID,$Income_Amount,$Income_Description)
    {
        $sql = "update user_income set Income_Amount=:Income_Amount,
                Income_Description=:Income_Description where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $result->bindValue(":Income_Amount", $Income_Amount);
        $result->bindValue(":Income_Description",$Income_Description);

        $isSuccess = $result->execute();
        return $isSuccess;
    }
}