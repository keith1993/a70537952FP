/**
 * Created by keat on 28-10-16.
 */
$(document).ready(function () {


    $("#changePassword").submit(function () {
        var a = true;
		
		//Old Password
		if (document.getElementById("oldPassword").value == "") {
				$("#errormsg_oldPassword").text("You can't leave this empty.");
				a=false;
				}
				else{
					$("#errormsg_oldPassword").text("");
				}	
				
				
		//New Password
		if (document.getElementById("newPassword").value == "") {
				$("#errormsg_newPassword").text("You can't leave this empty.");
				a=false;
				}
				else if (document.getElementById("newPassword").value.length < 8 ) {
				$("#errormsg_newPassword").text("Short passwords are easy to guess. Try one with at least 8 to 16 characters.");
				a=false;
				}
				else if (document.getElementById("newPassword").value.length > 16) {
					$("#errormsg_newPassword").text("Password that you entered is too long. Try one with 8 to 16 characters.");
				a=false;
				}
				else if (document.getElementById("newPassword").value ==(document.getElementById("oldPassword").value)){
				$("#errormsg_newPassword").text("New password should not same as old password.");
				a=false;
				}
				else{
					$("#errormsg_newPassword").text("");
				}
				
		//Confirm New Password
		if (document.getElementById("confirmNewPassword").value == "") {
				$("#errormsg_confirmNewPassword").text("You can't leave this empty.");
				a=false;
				}
				else if (document.getElementById("confirmNewPassword").value != (document.getElementById("newPassword").value) ){
				$("#errormsg_confirmNewPassword").text("These passwords don't match with new password. Try again?");
				a=false;
				}
				else{
					$("#errormsg_confirmNewPassword").text("");
				}
				
				if (a){
    			return true;
				}
				else{
					// Return false to cancel form action
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
				else if (document.getElementById("newPassword").value.length < 8 ) {
				$("#errormsg_newPassword").text("Short passwords are easy to guess. Try one with at least 8 to 16 characters.");
				}
				else if (document.getElementById("newPassword").value.length > 16) {
					$("#errormsg_newPassword").text("Password that you entered is too long. Try one with 8 to 16 characters.");
				}
				else if (document.getElementById("newPassword").value ==(document.getElementById("oldPassword").value)){
				$("#errormsg_newPassword").text("New password should not same as old password.");
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
