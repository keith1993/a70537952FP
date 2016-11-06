<?php

class UserFixedExpenseObject
{
    public $ExpenseID;
    public $UserID;
    public $Expense_Name;
    public $Expense_Amount;
    public $Expense_Category;
    public $Expense_Description;
    public $Expense_EnterDate;
    public $Expense_PayEvery;

    function __construct($result){
        $this->ExpenseID =$result[0];
        $this->UserID =$result[1];
        $this->Expense_Name =$result[2];
        $this->Expense_Amount =$result[3];
        $this->Expense_Category =$result[4];
        $this->Expense_Description =$result[5];
        //$this->Expense_EnterDate =date_format(new DateTime($result[6]),"d/m/Y");
        $this->Expense_EnterDate =date_format(new DateTime($result[6]),"Y/m/d");
        $this->Expense_PayEvery =$result[7];
    }


}