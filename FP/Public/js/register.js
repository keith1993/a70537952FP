			
			function emailFunction() {
    			if (document.getElementById("email").value == "") {
				$("#errormsg_email").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_email").text("");
				}	
			}
			
			function firstNameFunction() {
				var checkF = document.getElementById("firstName").value;
				
    			if (document.getElementById("firstName").value == "") {
				$("#errormsg_firstName").text("You can't leave this empty.");
				}else if (new RegExp(/\W/).test(checkF)){
					$("#errormsg_firstName").text("Please only enter alphabets or numbers for your first Name.");
				}
				else{
					$("#errormsg_firstName").text("");
				}
			}

			function lastNameFunction() {
				var checkL = document.getElementById("lastName").value;	
				
    			if (document.getElementById("lastName").value == "") {
				$("#errormsg_lastName").text("You can't leave this empty.");
				}
				else if (new RegExp(/\W/).test(checkL)){
					$("#errormsg_lastName").text("Please only enter alphabets or numbers for your last Name.");
				}
				else{
					$("#errormsg_lastName").text("");
				}
			}

			function passwordFunction() {
    			if (document.getElementById("password").value == "") {
					$("#errormsg_password").text("You can't leave this empty.");
				}
				else if(document.getElementById("password").value.length < 8 || document.getElementById("password").value.length > 16){
					$("#errormsg_password").text("Password length must be between 8 to 6 characters.");
				}
				else{
					$("#errormsg_password").text("");
				}
			}

			function confirmPasswordFunction() {
				if (document.getElementById("confirmPassword").value == "") {
					$("#errormsg_confirmPassword").text("You can't leave this empty.");
				}
				else if (document.getElementById("confirmPassword").value != document.getElementById("password").value) {
					$("#errormsg_confirmPassword").text("These passwords don't match. Try again?");
				}
				else{
					$("#errormsg_confirmPassword").text("");
				}
			}
			
			function occupationFunction() {
				var checkO = document.getElementById("occupation").value;
				
				if (document.getElementById("occupation").value == "") {
				$("#errormsg_occupation").text("You can't leave this empty.");
				}
				else if (new RegExp(/\W/).test(checkO)){
					$("#errormsg_occupation").text("Please only enter alphabets or numbers for your occupation.");
				}
				else{
					$("#errormsg_occupation").text("");
				}
			}
			
			//Submit function
			function submitFunction(){
			
			$('#registerForm').submit(function() {
			var a = true;
			
			//Email
				if (document.getElementById("email").value == "") {
				$("#errormsg_email").text("You can't leave this empty.");
				a=false;
				}
				else{
					$("#errormsg_email").text("");
				}
			
			//FirstName
			var checkF = document.getElementById("firstName").value;
			
    			if (document.getElementById("firstName").value == "") {
				$("#errormsg_firstName").text("You can't leave this empty.");
				a=false;
				}
				else if (new RegExp(/\W/).test(checkF)){
					$("#errormsg_firstName").text("Please only enter alphabets or numbers for your first Name.");
					a=false;
				}
				else{
					$("#errormsg_firstName").text("");
				}	
				
			//LastName
			var checkL = document.getElementById("lastName").value;
						
    			if (document.getElementById("lastName").value == "") {
				$("#errormsg_lastName").text("You can't leave this empty.");
				a=false;
				}
				else if (new RegExp(/\W/).test(checkL)){
					$("#errormsg_lastName").text("Please only enter alphabets or numbers for your last Name.");
				}
				else{
					$("#errormsg_lastName").text("");
				}
				
			//Password
				if (document.getElementById("password").value == "") {
					$("#errormsg_password").text("You can't leave this empty.");
					a=false;
				}
				else if(document.getElementById("password").value.length < 8 || document.getElementById("password").value.length > 16){
					$("#errormsg_password").text("Password length must be between 8 to 6 characters.");
					a=false;
				}
				else{
					$("#errormsg_password").text("");
				}
				
			//ConfirmPassword
				if (document.getElementById("confirmPassword").value == "") {
					$("#errormsg_confirmPassword").text("You can't leave this empty.");
					a=false;
				}
				else if (document.getElementById("confirmPassword").value != document.getElementById("password").value) {
					$("#errormsg_confirmPassword").text("These passwords don't match. Try again?");
					a=false;
				}
				else{
					$("#errormsg_confirmPassword").text("");
				}

			//Occupation
			var checkO = document.getElementById("occupation").value;
			
				if (document.getElementById("occupation").value == "") {
				$("#errormsg_occupation").text("You can't leave this empty.");
				a=false;
				}
				else if (new RegExp(/\W/).test(checkO)){
				a=false;
					$("#errormsg_occupation").text("Please only enter alphabets or numbers for your occupation.");
				}
				else{
					$("#errormsg_occupation").text("");
				}
				
    			if (a){
    			return true;
				}
				else{
					// Return false to cancel form action
					return false;
				}
			});

}