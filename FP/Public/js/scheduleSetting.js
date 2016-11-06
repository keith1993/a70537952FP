/**
 * Created by Admin on 06-11-16.
 */



function showInsertIncome() {

    document.getElementById("popoutInsert").style.display = "block"


    $("#InsertIncome").fadeIn(500);

}

function showInsertExpense() {

    document.getElementById("popoutInsert").style.display = "block"

    $("#InsertExpense").fadeIn(500);

}

function hideInsert() {

    /*document.getElementById("popoutInsert").style.display = "none"
     document.getElementById("InsertExpense").style.display = "none"
     document.getElementById("InsertIncome").style.display = "none"*/
    $("#popoutInsert").fadeOut(500);
    $("#InsertExpense").fadeOut(500);
    $("#InsertIncome").fadeOut(500);
    $("#expensesFormID")[0].reset();
    $("#incomeFormID")[0].reset();


}

function showEditIncome(IncomeID) {

    $.post("AJAXGetFixedIncomeByID.php",
        {
            IncomeID: IncomeID,

        },
        function (data, status) {

            if (data == "Fixed Income No Exists") {

                window.location.reload(true);
            } else {

                var incomeObject = JSON.parse(data);
                $("#IncomeID").val(incomeObject.IncomeID);
                $("#IncomeName").val(incomeObject.Income_Name);
                $("#IncomeAmount").val(incomeObject.Income_Amount);
                $("#IncomeDescription").val(incomeObject.Income_Description);
                $("#IncomePayEvery").val(incomeObject.Income_PayEvery);

                document.getElementById("popoutEdit").style.display = "block"
                $("#editIncome").fadeIn(500);
            }

        })




}

function showEditExpense(ExpenseID) {

    $.post("AJAXGetFixedExpenseByID.php",
        {
            ExpenseID: ExpenseID,

        },
        function (data, status) {

            if (data == "Fixed ExpenseID No Exists") {

                window.location.reload(true);
            } else {

                var ExpenseObject = JSON.parse(data);
                $("#ExpenseID").val(ExpenseObject.ExpenseID);
                $("#ExpenseName").val(ExpenseObject.Expense_Name);
                $("#ExpenseAmount").val(ExpenseObject.Expense_Amount);
                $("#ExpenseCategory").val(ExpenseObject.Expense_Category);
                $("#ExpenseDescription").val(ExpenseObject.Expense_Description);
                $("#ExpensePayEvery").val(ExpenseObject.Expense_PayEvery);

                document.getElementById("popoutEdit").style.display = "block"
                $("#editExpense").fadeIn(500);
            }

        })




}


function hideEdit() {

    /*document.getElementById("popoutInsert").style.display = "none"
     document.getElementById("InsertExpense").style.display = "none"
     document.getElementById("InsertIncome").style.display = "none"*/
    $("#popoutEdit").fadeOut(500);
    $("#editIncome").fadeOut(500);
    $("#editExpense").fadeOut(500);
    $("#editIncomeForm")[0].reset();
    $("#editExpenseForm")[0].reset();
}




$(document).off().on('click', '.remove', function(event) {
    event.preventDefault();
    event.stopPropagation();
    expenseNum--;

    $(this).parent().remove();


    if(expenseNum<3){

        $("#btnAddExpense").show();

    }

});

$(document).on('click', '.btnCancel', function() {
    $("#btnAddExpense").show();
    $(".extraExpense").remove();
    expenseNum = 1;
});

$(document).on('click', '.mask', function() {
    $("#btnAddExpense").show();
    $(".extraExpense").remove();
    expenseNum = 1;
});


function deleteExpense(expenseID){


    $.post("AJAXDeleteFixedExpense.php",
        {
            expenseID: expenseID,

        },
        function (data, status) {

            if (data == "deleteFixedExpenseSuccess") {

                window.location.reload(true);
            } else if (data == "deleteFixedExpenseFailed") {


                window.location.reload(true);

            }

        }

    )};


function deleteIncome(incomeID){


    $.post("AJAXDeleteFixedIncome.php",
        {
            incomeID: incomeID,

        },
        function (data, status) {

            if (data == "deleteFixedIncomeSuccess") {

                window.location.reload(true);
            } else if (data == "deleteFixedIncomeFailed") {


                window.location.reload(true);

            }

        }

    )};
