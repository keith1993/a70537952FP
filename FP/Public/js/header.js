/**
 * Created by Admin on 11-10-16.
 */
var isNavOpen = false;




jQuery(function ($) {
    if (Cookies.get('style')==null){
        changeStyle("red");
    }else{
        changeStyle(Cookies.get('style'));
    }
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


})



function  changeStyle(colour) {
    $("body").removeClass($("body").attr('class').split(' ').pop());
    $("body").addClass(colour + "-skin")

    Cookies.set('style', colour);

    switch (colour){
        case "red":
            //$(".wrapper").css("background-image", "url('https://newevolutiondesigns.com/images/freebies/anime-wallpaper-7.jpg')");
            $(".wrapper").css("background-image", "url('http://digitalart.io/wp-content/uploads/2014/01/Umbrella-Girl-In-The-Rain-Wallpaper.jpg')");
            break;
        case "purple":
            $(".wrapper").css("background-image", "url('https://s-media-cache-ak0.pinimg.com/originals/23/1c/52/231c5206fba3f704613c27614d867c16.jpg')");

            break;
        case "green":
            $(".wrapper").css("background-image", "url('http://kabegami.org/wp-content/uploads/2012/10/H9l6Or.jpg')");

            break;
        case "mdb":
            $(".wrapper").css("background-image", "url('https://avvesione.files.wordpress.com/2012/02/rinne_no_lagrange-06-sunrise-clouds-space-stars-wallpaper-beautiful-scenery.jpg')");

            break;
        case "graphite":
            $(".wrapper").css("background-image", "url('http://s1.1zoom.net/big0/809/Mountains_Lake_Scenery_443380.jpg')");


            break;
        case "pink":
            $(".wrapper").css("background-image", "url('../../Public/images/anime_landscape_person_12.jpg')");

            break;
    }



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
        document.getElementsByClassName("wrapper")[0].style.marginLeft = "50px";
        isNavOpen = false;
    } else {
        document.getElementById("profile").style.marginRight = "250px";
        document.getElementById("navControl").innerText = "Close";
        document.getElementById("userLogo").style.display = "block";
        document.getElementById("mySidenav").style.width = "250px";


        $(".main").each(function () {
            this.style.marginLeft = "250px";
        });

        document.getElementById("sideNavItem").style.display = "block";
        document.getElementById("colorStyle").style.display = "block";
        document.getElementsByClassName("wrapper")[0].style.marginLeft = "200px";
        isNavOpen = true;
    }


    function showLogout() {
        if ($("#Logout").hasClass("open")) {

            $("#Logout").removeClass("open");

        } else {

            $("#Logout").addClass("open");
        }

    }
}
/**
 * Created by Admin on 06-11-16.
 */
