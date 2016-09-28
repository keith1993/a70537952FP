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
    public $Income_Amount;
    public $Income_Description;
    public $Income_EnterDate;

    function __construct($result){
        $this->IncomeID =$result[0];
        $this->UserID =$result[1];
        $this->Income_Amount =$result[2];
        $this->Income_Description =$result[3];
        $this->Income_EnterDate =date_format(new DateTime($result[4]),"d/m/Y");
    }

}