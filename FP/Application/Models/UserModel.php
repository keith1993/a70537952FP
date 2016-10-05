<?php


/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19-09-16
 * Time: 7:38 PM
 */
class UserModel extends BaseModel
{
    /**
     * @return string
     */


    public function getUserByID($id)
    {
        $sql = "select * from user where id=:id";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();
        $result = $result->fetch();
        $user = new UserObject($result);
        return $user;
    }


    public function getUserByEmail($email)
    {
        $sql = "select * from user where Email=:email";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":email", $email);
        $result->execute();
        $result = $result->fetch();
        if ($result >= 1) {
            $user = new UserObject($result);
            return $user;
        } else {
            return false;
        }
    }

    public function Login($email, $password, $loginIP)
    {
        $sql = "select * from user where Email=:email and Password=md5(:password)";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":email", $email);
        $result->bindValue(":password", $password);
        $isSuccess = $result->execute();
        if ($isSuccess && $result->rowCount() >= 1) {

            $result = $result->fetch();
            $user = new UserObject($result);
            self::updateLastLoginDate($result[0]);
            self::updateLastLoginIP($result[0], $loginIP);
            return $user;
        } else {
            return false;
        }
    }

    public function Register($FirstName, $LastName, $Password, $DOB, $Gender, $Email,
                             $Country, $Occupation)
    {
        $sql = "insert into user (Email,FirstName,LastName,Password,DOB,Gender,Country,Occupation,
             RegisterDate,LastLoginDate,EmailVerified,LastChangePasswordDate,LastUpdateDate,
             Token,Token_expTime)
            values(:Email,:FirstName,:LastName,md5(:Password),:DOB,:Gender,:Country,:Occupation,
            now(),now(),0,now(),now(),
            :Token,:Token_expTime);";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":Email", $Email);
        $result->bindValue(":FirstName", $FirstName);
        $result->bindValue(":LastName", $LastName);
        $result->bindValue(":Password", $Password);
        $result->bindValue(":DOB", date_format(new DateTime($DOB), "Y/m/d"));
        $result->bindValue(":Gender", $Gender);
        $result->bindValue(":Country", $Country);
        $result->bindValue(":Occupation", $Occupation);
        $result->bindValue(":Token", self::generateToken($Email, $Password));
        $result->bindValue(":Token_expTime", self::generateTokenExpTime());


        $isSuccess = $result->execute();
        return $isSuccess;
    }


    public function ResetPassword($UserID, $oldPassword, $newPassword)
    {
        $sql = "update user set Password=md5(:newPassword) where id=:UserID and Password=md5(:oldPassword)";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":newPassword", $newPassword);
        $result->bindValue(":UserID", $UserID);
        $result->bindValue(":oldPassword", $oldPassword);
        $isSuccess = $result->execute();

        if ($isSuccess && $result->rowCount() >= 1) {
            $isSuccess = self::updateChangePasswordDate($UserID);
        } else {

            $isSuccess = false;
        }
        return $isSuccess;
    }

    public function updateUserByUserID($UserID, $FirstName, $LastName, $DOB, $Gender,
                                       $Country, $Occupation, $AboutMe)
    {
        $sql = "update user set FirstName=:FirstName, LastName=:LastName,DOB=:DOB
            ,Gender=:Gender,Country=:Country,Occupation=:Occupation,AboutMe=:AboutMe,LastUpdateDate=now() 
            where id=:UserID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $result->bindValue(":FirstName", $FirstName);
        $result->bindValue(":LastName", $LastName);
        $result->bindValue(":DOB", $DOB);
        $result->bindValue(":Gender", $Gender);
        $result->bindValue(":Country", $Country);
        $result->bindValue(":Occupation", $Occupation);
        $result->bindValue(":AboutMe", $AboutMe);
        $isSuccess = $result->execute();
        if ($isSuccess && $result->rowCount() >= 1) {
            $isSuccess = self::updateLastUpdateDate($UserID);
        } else {

            $isSuccess = false;
        }
        return $isSuccess;
    }

    private function updateChangePasswordDate($UserID)
    {
        $sql = "update user set LastChangePasswordDate=now() where id=:UserID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    private function updateLastLoginDate($UserID)
    {
        $sql = "update user set LastLoginDate=now() where id=:UserID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    private function updateLastLoginIP($UserID, $LoginIP)
    {
        $sql = "update user set LastLoginIP=:LoginIP where id=:UserID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $result->bindValue(":LoginIP", $LoginIP);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    private function updateLastUpdateDate($UserID)
    {
        $sql = "update user set LastUpdateDate=now() where id=:UserID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $isSuccess = $result->execute();
        return $isSuccess;
    }

    public function updateUserImage($UserID, $Files)
    {
        $sql = "update user set User_Image=:UserImage where id=:UserID";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $fileName = round(microtime(true) * 1000) . "R" . rand(10000, 99999);
        $upload = new UploadImage($fileName, $Files);
        $UserImage = $fileName . "." . $upload->imageFileType;
        $result->bindValue(":UserImage", $UserImage);
        $isSuccess = $result->execute();
        return $isSuccess;

    }

    public function isEmailExist($email)
    {
        $sql = "select * from user where Email=:email";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":email", $email);

        $isSuccess = $result->execute();
        if ($result->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function VerifyEmail($UserID, $token)
    {
        $sql = "select * from user where ID=:UserID and EmailVerified=0 and Token=:token";
        $result = self::$conn->prepare($sql);
        $result->bindValue(":UserID", $UserID);
        $result->bindValue(":token", $token);
        $isSuccess = $result->execute();
        if ($result->rowCount() >= 1 and $isSuccess) {

            $result = $result->fetch();
            $user = new UserObject($result);
            $isSuccess = self::setEmailVerified($user);

            return $isSuccess;

        } else {
            return false;
        }
    }

    private function generateToken($email, $password)
    {
        $token = md5($email . $password . time());
        return $token;
    }

    private function generateTokenExpTime()
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        return date("Y/m/d H:i:s", time() + 60 * 60 * 24);;
    }

    private function setEmailVerified($user)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if (date("Y/m/d H:i:s") > date_format(new DateTime($user->TokenExpTime), "Y/m/d")) {
            return false;
        } else {
            $sql = "update user set EmailVerified=1 where id=:UserID";
            $result = self::$conn->prepare($sql);
            $result->bindValue(":UserID", $user->ID);
            $isSuccess = $result->execute();
            return $isSuccess;
        }

    }

    public function setVerificationCode($userEmail)
    {

            $sql = "update user set Verification_Code=:VerificationCode where Email=:userEmail";
            $result = self::$conn->prepare($sql);

            $VerificationCode = self::generateVerificationCode();
            $result->bindValue(":VerificationCode",$VerificationCode );
            $result->bindValue(":userEmail", $userEmail);
            $isSuccess = $result->execute();
            if ($isSuccess){
                return $VerificationCode;

            }else{

                return false;
            }


    }

    private function generateVerificationCode()
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $VerificationCode = '';
        for ($i = 0; $i < 8; $i++) {
            $VerificationCode .= $characters[rand(0, $charactersLength - 1)];
        }
        return $VerificationCode;

    }

}