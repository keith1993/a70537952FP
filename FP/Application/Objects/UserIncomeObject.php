<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:06 PM
 */
class UserIncomeObject
{
    public $IncomeID;
    public $UserID;
    public $Income_Name;
    public $Income_Amount;
    public $Income_Category;
    public $Income_Description;
    public $Income_EnterDate;

    function __construct($result){
        $this->IncomeID =$result[0];
        $this->UserID =$result[1];
        $this->Income_Name =$result[2];
        $this->Income_Amount =$result[3];
        $this->Income_Category =$result[4];
        $this->Income_Description =$result[5];
        //$this->Income_EnterDate =date_format(new DateTime($result[6]),"d/m/Y");
        $this->Income_EnterDate =date_format(new DateTime($result[6]),"Y/m/d");
    }

}