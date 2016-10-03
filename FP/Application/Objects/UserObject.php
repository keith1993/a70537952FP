<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20-09-16
 * Time: 2:09 PM
 */




class UserObject
{
    public $ID;
    public $Email;
    public $FirstName;
    public $LastName;
    public $Password;
    public $DOB;
    public $Gender;
    public $Country;
    public $Occupation;
    public $AboutMe;
    public $RegisterDate;
    public $LastLoginDate;
    public $LastLoginIP;
    public $EmailVerified;
    public $LastChangePasswordDate;
    public $LastUpdateDate;
    public $UserImage;
    public $Token;
    public $Token_expTime;



    function __construct($result){
        $this->ID =$result[0];
        $this->Email =$result[1];
        $this->FirstName =$result[2];
        $this->LastName =$result[3];
        $this->Password =$result[4];
        $this->DOB =date_format(new DateTime($result[5]),"d/m/Y");
        $this->Gender =$result[6];
        $this->Country = $result[7];
        $this->Occupation = $result[8];
        $this->AboutMe = $result[9];
        $this->RegisterDate =$result[10];
        $this->LastLoginDate = $result[11];
        $this->LastLoginIP = $result[12];
        $this->EmailVerified = $result[13];
        $this->LastChangePasswordDate = $result[14];
        $this->LastUpdateDate = $result[15];
        $this->UserImage = $result[16];
        $this->Token = $result[17];
        $this->Token_expTime = $result[18];


    }

}