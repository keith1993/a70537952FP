<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06-11-16
 * Time: 2:30 PM
 */
class UserFixedIncomeModel extends BaseModel
{
    public function addFixedIncome($UserID, $Income_Name, $Income_Amount, $Income_Description,$Income_PayEvery)
    {
        $sql = "insert into user_fixed_income (User_ID,Income_Name,Income_Amount,Income_Category,
            Income_Description,Income_EnterDate,Income_PayEvery)
            values(:User_ID,:Income_Name,:Income_Amount,:Income_Category,:Income_Description,now(),:Income_PayEvery);";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Income_Name", $Income_Name);
        $result->bindValue(":Income_Amount", $Income_Amount);
        $result->bindValue(":Income_Category", "Fixed Income");
        $result->bindValue(":Income_Description", $Income_Description);
        $result->bindValue(":Income_PayEvery", $Income_PayEvery);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getFixedIncomeByUserID($UserID)
    {
        $sql = "select * from user_fixed_income where User_ID=:User_ID order by Income_EnterDate Desc";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $FixedIncomeList = new SplObjectStorage();
        foreach ($result as $key => $value) {
            $income = new UserFixedIncomeObject($value);
            $FixedIncomeList->attach($income);
        }
        return $FixedIncomeList;
    }

    public function getFixedIncomeByIncomeID($IncomeID)
    {
        $sql = "select * from user_fixed_income where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $result->execute();
        $result = $result->fetch();
        $FixedIncome = new UserFixedIncomeObject($result);
        return $FixedIncome;
    }

    public function deleteFixedIncomeByIncomeID($IncomeID)
    {
        $sql = "delete from user_fixed_income where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateFixedIncomeByIncomeID($IncomeID, $Income_Name, $Income_Amount, $Income_Description,$Income_PayEvery)
    {
        $sql = "update user_fixed_income set Income_Name=:Income_Name,Income_Amount=:Income_Amount,
                Income_Description=:Income_Description,Income_EnterDate=now(),Income_PayEvery=:Income_PayEvery where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $result->bindValue(":Income_Name", $Income_Name);
        $result->bindValue(":Income_Amount", $Income_Amount);
        $result->bindValue(":Income_Description", $Income_Description);
        $result->bindValue(":Income_PayEvery", $Income_PayEvery);

        $isSuccess = $result->execute();
        return $isSuccess;
    }
}