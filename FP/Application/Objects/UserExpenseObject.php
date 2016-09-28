<?php

class UserExpenseObject
{
    public $ExpenseID;
    public $UserID;
    public $Expense_Amount;
    public $Expense_Category;
    public $Expense_Description;
    public $Expense_EnterDate;

    function __construct($result){
        $this->ExpenseID =$result[0];
        $this->UserID =$result[1];
        $this->Expense_Amount =$result[2];
        $this->Expense_Category =$result[3];
        $this->Expense_Description =$result[4];
        $this->Expense_EnterDate =date_format(new DateTime($result[5]),"d/m/Y");
    }


}