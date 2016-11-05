/**
 * Created by Admin on 11-10-16.
 */
var isNavOpen = false;
var expenseNum = 1;
var scaleLineColor = "rgba(255,255,255,.3)"; //Colour of the scale line
var scaleBackdropColor =  "rgba(255,255,255,0.7)";//The colour of the label backdrop
var angleLineColor =  "rgba(255,255,255,.1)" ;// Colour of the angle line
var pointLabelFontColor= "#fff";//String - Point label font colour
var fillColor= "rgba(220,220,220,0.5)";
var strokeColor= "rgba(220,220,220,1)";
var pointColor= "rgba(220,220,220,1)";
var pointStrokeColor= "#fff";
var data;
var chart;
var LastMonthmyChart;
var LastLastMonthmyChart;
var options = {

    //Boolean - If we show the scale above the chart data
    scaleOverlay: false,

    //Boolean - If we want to override with a hard coded scale
    scaleOverride: false,

    //** Required if scaleOverride is true **
    //Number - The number of steps in a hard coded scale
    scaleSteps: null,
    //Number - The value jump in the hard coded scale
    scaleStepWidth: null,
    //Number - The centre starting value
    scaleStartValue: null,

    //Boolean - Whether to show lines for each scale point
    scaleShowLine: true,

    //String - Colour of the scale line
    scaleLineColor: scaleLineColor,

    //Number - Pixel width of the scale line
    scaleLineWidth: 1,

    //Boolean - Whether to show labels on the scale
    scaleShowLabels: false,

    //Interpolated JS string - can access value
    scaleLabel: "<%=value%>",

    //String - Scale label font declaration for the scale label
    scaleFontFamily: "'Arial'",

    //Number - Scale label font size in pixels
    scaleFontSize: 15,

    //String - Scale label font weight style
    scaleFontStyle: "normal",

    //String - Scale label font colour
    scaleFontColor: "#fff",

    //Boolean - Show a backdrop to the scale label
    scaleShowLabelBackdrop: true,

    //String - The colour of the label backdrop
    scaleBackdropColor: scaleBackdropColor,

    //Number - The backdrop padding above & below the label in pixels
    scaleBackdropPaddingY: 2,

    //Number - The backdrop padding to the side of the label in pixels
    scaleBackdropPaddingX: 2,

    //Boolean - Whether we show the angle lines out of the radar
    angleShowLineOut: true,

    //String - Colour of the angle line
    angleLineColor: angleLineColor,

    //Number - Pixel width of the angle line
    angleLineWidth: 1,

    //String - Point label font declaration
    pointLabelFontFamily: "'Arial'",

    //String - Point label font weight
    pointLabelFontStyle: "normal",

    //Number - Point label font size in pixels
    pointLabelFontSize: 16,

    //String - Point label font colour
    pointLabelFontColor: pointLabelFontColor,

    //Boolean - Whether to show a dot for each point
    pointDot: true,

    //Number - Radius of each point dot in pixels
    pointDotRadius: 3,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill: true,

    //Boolean - Whether to animate the chart
    animation: false,

    //Number - Number of animation steps
    animationSteps: 60,

    //String - Animation easing effect
    animationEasing: "easeOutQuart",

    //Function - Fires when the animation is complete
    onAnimationComplete: null,

    responsive: true

};


jQuery(function ($) {
    $('.tableIncome').footable();

    $('.tableExpense').footable();
    /************************************/
    $('[delete=expense]').confirmation({
        rootSelector: '[data-toggle=confirmation-singleton]',
        popout:true,
        title:"Are you sure delete?",
        onConfirm:function() {deleteExpense($(this).attr("expenseID"))}//function(){alert($(this).attr("expenseID"));}
    });

    $('[delete=income]').confirmation({
        rootSelector: '[data-toggle=confirmation-singleton]',
        popout:true,
        title:"Are you sure delete?",
        onConfirm:function() {deleteIncome($(this).attr("incomeID"))}//function(){alert($(this).attr("incomeID"));}

    });
    /*********************************/
    if (Cookies.get('style')==null){
        changeStyle("red");
    }else{
        changeStyle(Cookies.get('style'));
    }
    alert("111");
    alert($(".myChart").length);
    //chart = new Chart($(".myChart").get(0).getContext("2d")).Radar(data, options);

})

function setChartBlackStyle(){

    scaleLineColor = "rgba(0,0,0,.3)"; //Colour of the scale line
     scaleBackdropColor =  "rgba(0,0,0,0.7)";//The colour of the label backdrop
     angleLineColor =  "rgba(0,0,0,.1)" ;// Colour of the angle line
    pointLabelFontColor= "#000";//String - Point label font colour
     fillColor= "rgba(30,30,30,0.5)";
     strokeColor= "rgba(30,30,30,1)";
     pointColor= "rgba(30,30,30,1)";
     pointStrokeColor= "#000";
    $("#overview").addClass("overviewBlack")
}

function setChartWhiteStyle(){

    scaleLineColor = "rgba(255,255,255,.3)"; //Colour of the scale line
    scaleBackdropColor =  "rgba(255,255,255,0.7)";//The colour of the label backdrop
     angleLineColor =  "rgba(255,255,255,.1)" ;// Colour of the angle line
    pointLabelFontColor= "#fff";//String - Point label font colour
     fillColor= "rgba(220,220,220,0.5)";
     strokeColor= "rgba(220,220,220,1)";
     pointColor= "rgba(220,220,220,1)";
     pointStrokeColor= "#fff";
    $("#overview").addClass("overviewWhite")
}

function  changeStyle(colour) {
    $("body").removeClass($("body").attr('class').split(' ').pop());
    $("body").addClass(colour + "-skin")
    $("#overview").removeClass("overviewBlack");
    $("#overview").removeClass("overviewWhite");

    Cookies.set('style', colour);

    switch (colour){
        case "red":
            $(".content").css("background-image", "url('https://newevolutiondesigns.com/images/freebies/anime-wallpaper-7.jpg')");
            setChartWhiteStyle();
            break;
        case "purple":
            $(".content").css("background-image", "url('https://s-media-cache-ak0.pinimg.com/originals/23/1c/52/231c5206fba3f704613c27614d867c16.jpg')");
            setChartWhiteStyle();
            break;
        case "green":
            $(".content").css("background-image", "url('http://kabegami.org/wp-content/uploads/2012/10/H9l6Or.jpg')");
            setChartWhiteStyle();
            break;
        case "mdb":
            $(".content").css("background-image", "url('https://avvesione.files.wordpress.com/2012/02/rinne_no_lagrange-06-sunrise-clouds-space-stars-wallpaper-beautiful-scenery.jpg')");
            setChartWhiteStyle();

            break;
        case "graphite":
            $(".content").css("background-image", "url('http://s1.1zoom.net/big0/809/Mountains_Lake_Scenery_443380.jpg')");
            setChartWhiteStyle();

            break;
        case "pink":
            $(".content").css("background-image", "url('Public/images/anime_landscape_person_12.jpg')");
            setChartWhiteStyle();
            break;
    }




    var options1 = {

        //Boolean - If we show the scale above the chart data
        scaleOverlay: false,

        //Boolean - If we want to override with a hard coded scale
        scaleOverride: false,

        //** Required if scaleOverride is true **
        //Number - The number of steps in a hard coded scale
        scaleSteps: null,
        //Number - The value jump in the hard coded scale
        scaleStepWidth: null,
        //Number - The centre starting value
        scaleStartValue: null,

        //Boolean - Whether to show lines for each scale point
        scaleShowLine: true,

        //String - Colour of the scale line
        scaleLineColor: scaleLineColor,

        //Number - Pixel width of the scale line
        scaleLineWidth: 1,

        //Boolean - Whether to show labels on the scale
        scaleShowLabels: false,

        //Interpolated JS string - can access value
        scaleLabel: "<%=value%>",

        //String - Scale label font declaration for the scale label
        scaleFontFamily: "'Arial'",

        //Number - Scale label font size in pixels
        scaleFontSize: 15,

        //String - Scale label font weight style
        scaleFontStyle: "normal",

        //String - Scale label font colour
        scaleFontColor: "#fff",

        //Boolean - Show a backdrop to the scale label
        scaleShowLabelBackdrop: true,

        //String - The colour of the label backdrop
        scaleBackdropColor: scaleBackdropColor,

        //Number - The backdrop padding above & below the label in pixels
        scaleBackdropPaddingY: 2,

        //Number - The backdrop padding to the side of the label in pixels
        scaleBackdropPaddingX: 2,

        //Boolean - Whether we show the angle lines out of the radar
        angleShowLineOut: true,

        //String - Colour of the angle line
        angleLineColor: angleLineColor,

        //Number - Pixel width of the angle line
        angleLineWidth: 1,

        //String - Point label font declaration
        pointLabelFontFamily: "'Arial'",

        //String - Point label font weight
        pointLabelFontStyle: "normal",

        //Number - Point label font size in pixels
        pointLabelFontSize: 16,

        //String - Point label font colour
        pointLabelFontColor: pointLabelFontColor,

        //Boolean - Whether to show a dot for each point
        pointDot: true,

        //Number - Radius of each point dot in pixels
        pointDotRadius: 3,

        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,

        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,

        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,

        //Boolean - Whether to fill the dataset with a colour
        datasetFill: true,

        //Boolean - Whether to animate the chart
        animation: false,

        //Number - Number of animation steps
        animationSteps: 60,

        //String - Animation easing effect
        animationEasing: "easeOutQuart",

        //Function - Fires when the animation is complete
        onAnimationComplete: null,

        responsive: true



    };
    //chart.destroy();

    var ctx = $("#myChart").get(0).getContext("2d");
    //chart =  new Chart(ctx).Radar(data,options1);





}




function setNav() {
    if (isNavOpen) {
        document.getElementById("profile").style.marginRight = "0px";

        document.getElementById("navControl").innerHTML = "&#9776";
        document.getElementById("userLogo").style.display = "none";

        document.getElementById("mySidenav").style.width = "50px";
        $(".main").each(function () {
            this.style.marginLeft = "0px";
        });
        document.getElementById("sideNavItem").style.display = "none";
        document.getElementById("colorStyle").style.display = "none";
        document.getElementById("Chart").style.marginRight = "45px";
        isNavOpen = false;
    } else {
        document.getElementById("profile").style.marginRight = "250px";
        document.getElementById("navControl").innerText = "Close";
        document.getElementById("userLogo").style.display = "block";
        document.getElementById("mySidenav").style.width = "250px";


        $(".main").each(function () {
            this.style.marginLeft = "200px";
        });
        document.getElementsByClassName("main")[0].style.marginLeft = "250px";
        document.getElementById("sideNavItem").style.display = "block";
        document.getElementById("colorStyle").style.display = "block";
        document.getElementById("Chart").style.marginRight = "105px";
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

function showEditIncome(IncomeID) {

    $.post("Application/Controllers/AJAXGetIncomeByID.php",
        {
            IncomeID: IncomeID,

        },
        function (data, status) {

            if (data == "Income No Exists") {

                window.location.reload(true);
            } else {

                var incomeObject = JSON.parse(data);
                $("#IncomeID").val(incomeObject.IncomeID);
                $("#IncomeName").val(incomeObject.Income_Name);
                $("#IncomeAmount").val(incomeObject.Income_Amount);
                $("#IncomeDescription").val(incomeObject.Income_Description);
                var formattedDate = moment(new Date(incomeObject.Income_EnterDate)).format('YYYY-MM-DD');
                $("#IncomeEnterDate").val(formattedDate);

                document.getElementById("popoutEdit").style.display = "block"
                $("#editIncome").fadeIn(500);
            }

        })




}

function showEditExpense(ExpenseID) {

    $.post("Application/Controllers/AJAXGetExpenseByID.php",
        {
            ExpenseID: ExpenseID,

        },
        function (data, status) {

            if (data == "ExpenseID No Exists") {

                window.location.reload(true);
            } else {

                var ExpenseObject = JSON.parse(data);
                $("#ExpenseID").val(ExpenseObject.ExpenseID);
                $("#ExpenseName").val(ExpenseObject.Expense_Name);
                $("#ExpenseAmount").val(ExpenseObject.Expense_Amount);
                $("#ExpenseCategory").val(ExpenseObject.Expense_Category);
                $("#ExpenseDescription").val(ExpenseObject.Expense_Description);
                var formattedDate = moment(new Date(ExpenseObject.Expense_EnterDate)).format('YYYY-MM-DD');
                $("#ExpenseEnterDate").val(formattedDate);

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

function addExpense() {
    var expense = "<div class=\"extraExpense\"><div class=\"form-group col-sm-3  col-md-3 col-lg-3\"><label for=\"ExpenseName\" class=\"control-label\">Expense Name:</label><input class=\"form-control\" type=\"text\" name=\"expenseName[]\" value=\"\" required></div>"+
"<div class=\"form-group col-sm-3  col-md-3 col-lg-3\"> <label for=\"ExpenseAmount\" class=\"control-label\">Expense Amount:</label><input class=\"form-control\" type=\"number\" name=\"expenseAmount[]\" value=\"0.00\"  pattern=\"[0-9]+([\.,][0-9]+)?\" title=\"Only Allow Number\" step=\"0.01\"required></div><div class=\"form-group  col-sm-2  col-md-2 col-lg-2\">"+
"<label for=\" ExpenseCategory\" class=\"control-label\">Expense Category:</label><select class=\"form-control\" name=\"expenseCategory[]\"style=\"display: inline-block\" required> " +
"<option value=\"Transport\">Transport</option><option value=\"Food & beverage\">Food & beverage</option><option value=\"Entertainment\">Entertainment</option><option value=\"Debts\">Debts</option> " +
"<option value=\"Fixed expenses\">Fixed expenses</option>"+
"<option value=\"Others\">Others</option> </select>"+
"</div><div class=\"form-group  col-sm-3  col-md-3 col-lg-3\"><label for=\" ExpenseDescription\" class=\"control-label\">Expense Description:</label> <input class=\"form-control\" type=\"text\" name=\"expenseDescription[]\" value=\"\">" +
"</div> <a style=\"color: red;\" class=\"remove  col-sm-1  col-md-1 col-lg-1\" >X</a> </br> <hr style=\"border-top: 1px solid rgba(0,0,0,0.3);width: 90%;margin-top: 0\"/>";


    $("#expenseContainer").append(expense);
    expenseNum++;

    if(expenseNum>=3){

        $("#btnAddExpense").hide();

    }


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


    $.post("Application/Controllers/AJAXDeleteExpense.php",
        {
            expenseID: expenseID,

        },
        function (data, status) {

            if (data == "deleteExpenseSuccess") {

                window.location.reload(true);
            } else if (data == "deleteExpenseFailed") {


                window.location.reload(true);

            }

        }

)};


function deleteIncome(incomeID){


    $.post("Application/Controllers/AJAXDeleteIncome.php",
        {
            incomeID: incomeID,

        },
        function (data, status) {

            if (data == "deleteIncomeSuccess") {

                window.location.reload(true);
            } else if (data == "deleteIncomeFailed") {


                window.location.reload(true);

            }

        }

    )};


function showLogout() {
if($( "#logout" ).hasClass( "open" )){

    $("#logout").removeClass("open");

}else{

    $("#logout").addClass("open");
}

}

