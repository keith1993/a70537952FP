/**
 * Created by Admin on 11-10-16.
 */
var isNavOpen = false;
var expenseNum = 1;





function setNav() {
    if (isNavOpen) {
        document.getElementById("profile").style.marginRight = "0px";

        document.getElementById("navControl").innerHTML = "&#9776";
        document.getElementById("userLogo").style.display = "none"

        document.getElementById("mySidenav").style.width = "50px";
        $(".main").each(function () {
            this.style.marginLeft = "0px";
        });
        document.getElementById("sideNavItem").style.display = "none"
        isNavOpen = false;
    } else {
        document.getElementById("profile").style.marginRight = "250px";
        document.getElementById("navControl").innerText = "Close";
        document.getElementById("userLogo").style.display = "block"
        document.getElementById("mySidenav").style.width = "250px";


        $(".main").each(function () {
            this.style.marginLeft = "200px";
        });
        document.getElementsByClassName("main")[0].style.marginLeft = "250px";
        document.getElementById("sideNavItem").style.display = "block"
        isNavOpen = true;
    }

}

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

function addExpense() {
    var expense = "<div class=\"extraExpense\"><div class=\"form-group\"><label for=\"ExpenseName\" class=\"control-label\">Expense Name:</label><input class=\"form-control\" type=\"text\" name=\"expenseName[]\" value=\"\"></div>"+
"<div class=\"form-group\"> <label for=\"ExpenseAmount\" class=\"control-label\">Expense Amount:</label><input class=\"form-control\" type=\"text\" name=\"expenseAmount[]\" value=\"\"></div><div class=\"form-group\">"+
"<label for=\" ExpenseCategory\" class=\"control-label\">Expense Category:</label><select class=\"form-control\" name=\"expenseCategory[]\"style=\"display: inline-block\"> " +
"<option value=\"Transport\">Transport</option><option value=\"Food & beverage\">Food & beverage</option><option value=\"Entertainment\">Entertainment</option><option value=\"Debts\">Debts</option> " +
"<option value=\"Fixed expenses\">Fixed expenses</option>"+
"<option value=\"Others\">Others</option> </select>"+
"</div><div class=\"form-group\"><label for=\" ExpenseDescription\" class=\"control-label\">Expense Description:</label> <input class=\"form-control\" type=\"text\" name=\"expenseDescription[]\" value=\"\">" +
"</div> <a style=\"color: red;margin-left: 10px;\" class=\"remove\" >X</a> </br> <hr style=\"border-top: 1px solid rgba(0,0,0,0.3);width: 90%;margin-top: 0\"/>";


    $("#expenseContainer").append(expense);
    expenseNum++;

    if(expenseNum>=5){

        $("#btnAddExpense").hide();

    }


}


$(document).off().on('click', '.remove', function(event) {
    event.preventDefault();
    event.stopPropagation();
    expenseNum--;

    $(this).parent().remove();


    if(expenseNum<5){

        $("#btnAddExpense").show();

    }

});

$(document).on('click', '.btnCancelSubmit', function() {

    $(".extraExpense").remove();
    expenseNum = 1;
});

$(document).on('click', '.mask', function() {

    $(".extraExpense").remove();
    expenseNum = 1;
});
