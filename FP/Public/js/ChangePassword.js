/**
 * Created by keat on 28-10-16.
 */
$(document).ready(function () {


    $("#changePassword").submit(function () {
        var newPassword = $("#newPassword").val();
        var confirmNewPassword = $("#confirmNewPassword").val();

        if (newPassword == confirmNewPassword) {


            return true;
        } else {

            $('#error').show();
            return false;
        }

    });

});
