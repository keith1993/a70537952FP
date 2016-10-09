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

        $.post("../../Application/Controllers/ForgotPassword.php",
            {

                Email: email
            },
            function (data, status) {

                if (data == "EmailExist") {

                    $("#enterRecoveryCode").show();
                    $("#send").prop("disabled", true);
                    $("#email").prop("disabled", true);
                } else if (data == "EmailNoExist") {

                    $("#EmailInvalid").show();
                }
            });
    });

}

function confirm(){

    $("#confirm").click(function () {

        var recoveryCode = $("#recoveryCode").val();
        var email = $("#email").val();
        $.post("../../Application/Controllers/ForgotPassword.php",
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