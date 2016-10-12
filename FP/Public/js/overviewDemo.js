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
        isNavOpen = false;
    } else {
        document.getElementById("profile").style.marginRight = "250px";
        document.getElementById("navControl").innerText = "Close";
        document.getElementById("userLogo").style.display = "block"
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementsByClassName("main")[0].style.marginLeft = "250px";
        document.getElementsByClassName("main")[1].style.marginLeft = "250px";

        isNavOpen = true;
    }

}
