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
function oldPasswordFunction() {
    			if (document.getElementById("oldPassword").value == "") {
				$("#errormsg_oldPassword").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_oldPassword").text("");
				}	
			}

function newPasswordFunction() {				
    			if (document.getElementById("newPassword").value == "") {
				$("#errormsg_newPassword").text("You can't leave this empty.");
				}
				else if (document.getElementById("newPassword").value ==(document.getElementById("oldPassword").value)){
				$("#errormsg_newPassword").text("New password should not same as old password.");
				}
				else if (document.getElementById("newPassword").value < 8) {
				$("#errormsg_newPassword").text("Short passwords are easy to guess. Try one with at least 8 characters.");
				}
				else{
					$("#errormsg_newPassword").text("");
				}
			}
			
function confirmNewPasswordFunction() {
				if (document.getElementById("confirmNewPassword").value == "") {
				$("#errormsg_confirmNewPassword").text("You can't leave this empty.");
				}
				else if (document.getElementById("confirmNewPassword").value != (document.getElementById("newPassword").value) ){
				$("#errormsg_confirmNewPassword").text("These passwords don't match with new password. Try again?");
				}
				else{
					$("#errormsg_confirmNewPassword").text("");
				}
			}
