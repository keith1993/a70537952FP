<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:05 PM
 */
class UserTargetModel extends  BaseModel
{
    public function addTarget($UserID,$Target_Name,$Target_Amount,$Target_Days,$Target_AchieveDate)
    {
        $sql = "insert into target (User_ID,Target_Name,Target_Amount,
            Target_Days,Target_AchieveDate,Target_EnterDate)
            values(:User_ID,:Target_Name,:Target_Amount,:Target_Days,:Target_AchieveDate,now())";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->bindValue(":Target_Name", $Target_Name);
        $result->bindValue(":Target_Amount", $Target_Amount);
        $result->bindValue(":Target_Days",$Target_Days);
        $result->bindValue(":Target_AchieveDate",$Target_AchieveDate);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function getTargetByUserID($UserID)
    {
        $sql = "select * from target where User_ID=:User_ID limit 0,100";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":User_ID", $UserID);
        $result->execute();
        $result = $result->fetchAll();
        $incomeList =  new SplObjectStorage();
        foreach ($result as $key =>$value){
            $target = new UserTargetObject($value);
            $targetList->attach($target);
        }
        return $targetList;
    }

    public function deleteTargetByTargetID($TargetID)
    {
        $sql = "delete from target where Target_ID=:Target_ID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":Target_ID", $TargetID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateTargetByTargetID($Target_ID,$Target_Name,$Target_Amount,$Target_Days,$Target_AchieveDate)
    {
        $sql = "update target set Target_Name=:Target_Name,Target_Amount=:Target_Amount,
                Target_Days=:Target_Days,Target_AchieveDate=:Target_AchieveDate where Target_ID=:Target_ID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":Target_ID", $Target_ID);
        $result->bindValue(":Target_Name", $Target_Name);
        $result->bindValue(":Target_Amount", $Target_Amount);
        $result->bindValue(":Target_Days",$Target_Days);
        $result->bindValue(":Target_AchieveDate",$Target_AchieveDate);

        $isSuccess = $result->execute();
        return $isSuccess;
    }

}
