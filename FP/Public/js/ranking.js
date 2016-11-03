/**
 * Created by Admin on 11-10-16.
 */
var isNavOpen = false;



jQuery(function ($) {
    $('.tableIncome').footable();

    $('.tableExpense').footable();

    if (Cookies.get('style')==null){
        changeStyle("red");
    }else{
        changeStyle(Cookies.get('style'));
    }

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
            $(".content").css("background-image", "url('http://www.walldevil.com/wallpapers/a79/background-scenery-pictures-beautiful-beach-image-wallpatrol-sunset-paradise.jpg')");
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




}



function showLogout() {
    if($("#Logout").hasClass("open")){

        $("#Logout").removeClass("open");

    }else{

        $("#Logout").addClass("open");
    }

}

