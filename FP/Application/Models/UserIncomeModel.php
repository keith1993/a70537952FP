<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:05 PM
 */
class UserIncomeModel extends  BaseModel
{
    public function addIncome($UserID, $Income_Name, $Income_Amount, $Income_Description)
    {
        $sql = "insert into user_income (User_ID,Income_Name,Income_Amount,Income_Category,
            Income_Description,Income_EnterDate)
            values(:User_ID,:Income_Name,:Income_Amount,:Income_Category,:Income_Description,now());";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Income_Name", $Income_Name);
        $result->bindValue(":Income_Amount", $Income_Amount);
        $result->bindValue(":Income_Category", "Other");
        $result->bindValue(":Income_Description", $Income_Description);


        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getIncomeByUserID($UserID)
    {
        $sql = "select * from user_income where User_ID=:User_ID order by Income_EnterDate Desc";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $incomeList = new SplObjectStorage();
        foreach ($result as $key => $value) {
            $income = new UserIncomeObject($value);
            $incomeList->attach($income);
        }
        return $incomeList;
    }

    public function getIncomeByIncomeID($IncomeID)
    {
        $sql = "select * from user_income where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $result->execute();
        $result = $result->fetch();
        $income = new UserIncomeObject($result);
        return $income;
    }

    public function deleteIncomeByIncomeID($IncomeID)
    {
        $sql = "delete from user_income where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateIncomeByIncomeID($IncomeID, $Income_Name, $Income_Amount, $Income_Description, $Income_EnterDate)
    {
        $sql = "update user_income set Income_Name=:Income_Name,Income_Amount=:Income_Amount,
                Income_Description=:Income_Description,Income_EnterDate=:Income_EnterDate where Income_ID=:IncomeID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":IncomeID", $IncomeID);
        $result->bindValue(":Income_Name", $Income_Name);
        $result->bindValue(":Income_Amount", $Income_Amount);
        $result->bindValue(":Income_Description", $Income_Description);
        $result->bindValue(":Income_EnterDate", $Income_EnterDate);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getIncomeGroupByUserIDAndMonth($UserID, $Month)
    {
        $sql = "SELECT Income_Category,SUM(Income_Amount) as Income_Amount FROM `user_income` 
              where User_ID=:User_ID and MONTH(Income_EnterDate)=:mon GROUP by Income_Category ORDER BY Income_Category ASC";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":mon", $Month);
        $result->execute();
        $result = $result->fetchAll();

        $incomeGroup = array();
        foreach ($result as $key => $value) {

            $incomeGroup[$value['Income_Category']] = $value['Income_Amount'];
        }


        return $incomeGroup;
    }


    public function getTodayIncomeGroupByUserID($UserID)
    {
        $sql = "SELECT Income_Category,SUM(Income_Amount) as Income_Amount FROM `user_income` where User_ID=:User_ID and Income_EnterDate=CURDATE() GROUP by Income_Category ORDER BY Income_Category ASC";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();

        $IncomeGroup = array();
        foreach ($result as $key => $value) {

            $IncomeGroup[$value['Income_Category']] = $value['Income_Amount'];
        }


        return $IncomeGroup;
    }


    public function getTodayTotalIncomeRanking()
    {
        $sql = "select @rank:=@rank+1 as rank,p.User_ID,p.Total_Income_Amount from(select @rank := 0)r,(select User_ID,SUM(Income_Amount) as Total_Income_Amount FROM `user_income`
where Income_EnterDate=CURDATE() GROUP by User_ID ORDER by Total_Income_Amount desc limit 0,100)p";

        $result = self::$conn->prepare($sql);

        $result->execute();
        $result = $result->fetchAll();

        $TotalIncomeRanking = array();
        foreach ($result as $key => $value) {

            $object = new stdClass();
            $object->rank = $value['rank'];
            $object->User_ID = $value['User_ID'];
            $object->Total_Income_Amount = $value['Total_Income_Amount'];
            $TotalIncomeRanking[$value['User_ID']] = $object;
        }


        return $TotalIncomeRanking;
    }


    public function getTodayTotalIncomeRankingByUserID($UserID)
    {
        $sql = "select * from(select @rank:=@rank+1 as rank,p.User_ID,p.Total_Income_Amount from(select @rank := 0)r,(select User_ID,SUM(Income_Amount)
as Total_Income_Amount FROM `user_income` where Income_EnterDate=CURDATE() GROUP by User_ID ORDER by Total_Income_Amount desc limit 0,100)p)a where User_ID=:User_ID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetch();



            $object = new stdClass();
            $object->rank = $result['rank'];
            $object->User_ID = $result['User_ID'];
            $object->Total_Expense_Amount = $result['Total_Income_Amount'];




        return $object;

    }

}