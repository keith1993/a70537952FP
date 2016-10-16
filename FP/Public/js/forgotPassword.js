/**
 * Created by Admin on 09-10-16.
 */


$(document).ready(function () {
    sendClick();

    confirm();
});

function sendClick(){

    $("#send").click(function () {

        var email = $("#email").val();
        $.post("../../Application/Controllers/AJAXCheckEmail.php",
            {

                Email: email
            },
            function (data, status) {

                if (data == "Email exist") {

                    $("#enterRecoveryCode").show();
                    $("#send").prop("disabled", true);
                    $("#email").prop("disabled", true);

                    $.post("../../Application/Controllers/AJAXForgotPassword.php",
                        {

                            Email: email
                        },
                        function (data, status) {


                        });




                } else if (data == "Email no exist") {

                    $("#EmailInvalid").show();

                }
            });

    });

}

function confirm(){

    $("#confirm").click(function () {

        var recoveryCode = $("#recoveryCode").val();
        var email = $("#email").val();
        $.post("../../Application/Controllers/AJAXForgotPassword.php",
            {
                Email: email,
                recoveryCode: recoveryCode
            },
            function (data, status) {

                if (data == "true") {

                    var url = "../Controllers/ResetPassword.php";
                    var form = $('<form style="display:none;" action="' + url + '" method="post">' +
                        '<input type="text" name="email" value="' + email + '" />' +
                        '<input type="text" name="recoveryCode" value="' + recoveryCode + '" />' +
                        '</form>');
                    $('body').append(form);
                    form.submit();

                } else if (data == "false") {

                    $("#CodeInvalid").show();




                }
            });


    });

}