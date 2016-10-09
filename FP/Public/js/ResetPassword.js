/**
 * Created by Admin on 09-10-16.
 */
$(document).ready(function () {


    $('#resetPassword').submit(function () {
        var newPassword = $('#newPassword').val();
        var confirmNewPassword = $('#confirmNewPassword').val();


        if (newPassword == confirmNewPassword) {


            return true;
        } else {

            $('#error').show();
            return false;
        }

    });

});
