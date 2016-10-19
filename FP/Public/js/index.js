/**
 * Created by Admin on 16-10-16.
 */
$(document).ready(function () {



    $("#btnLogin").click(function () {

        var email = $("#email").val();
        var password = $("#password").val();

        $("#notice").hide();
        $.post("Application/Controllers/AJAXLogin.php",
            {
                email: email,
                password: password,


            },
            function (data, status) {

                if (data == "LoginSuccess") {

                    window.location.reload(true);
                } else if (data == "LoginFailed") {

                    $("#notice").text("Email or Password Incorrect");
                    $("#notice").show();

                }else if(data == "EmailNoVerify"){
                    $("#notice").text("Email have not verify");
                    $("#notice").show();

                }


                //window.location.href = data;
            });


    });


});