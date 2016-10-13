/**
 * Created by Admin on 11-10-16.
 */
var isNavOpen = false;

function setNav() {
    if (isNavOpen) {
        document.getElementById("profile").style.marginRight = "0px";

        document.getElementById("navControl").innerHTML = "&#9776";
        document.getElementById("userLogo").style.display = "none"

        document.getElementById("mySidenav").style.width = "50px";
        document.getElementsByClassName("main")[0].style.marginLeft = "0px";
        document.getElementsByClassName("main")[1].style.marginLeft = "0px";
        document.getElementById("sideNavItem").style.display = "none"
        isNavOpen = false;
    } else {
        document.getElementById("profile").style.marginRight = "250px";
        document.getElementById("navControl").innerText = "Close";
        document.getElementById("userLogo").style.display = "block"
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementsByClassName("main")[0].style.marginLeft = "250px";
        document.getElementsByClassName("main")[1].style.marginLeft = "200px";
        document.getElementById("sideNavItem").style.display = "block"
        isNavOpen = true;
    }

}

function showInsertIncome(){

   document.getElementById("popoutInsert").style.display = "block"


    $( "#InsertIncome" ).fadeIn(500);

}

function showInsertExpense(){

    document.getElementById("popoutInsert").style.display = "block"

    $( "#InsertExpense" ).fadeIn(500);

}

function hideInsert(){

    /*document.getElementById("popoutInsert").style.display = "none"
    document.getElementById("InsertExpense").style.display = "none"
    document.getElementById("InsertIncome").style.display = "none"*/
    $( "#popoutInsert" ).fadeOut(500);
    $( "#InsertExpense" ).fadeOut(500);
    $( "#InsertIncome" ).fadeOut(500);
}




