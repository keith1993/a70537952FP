			
			function emailFunction() {
    			if (document.getElementById("email").value == "") {
				$("#errormsg_email").text("You can't leave this empty.");
				}	
			}
			
			function firstNameFunction() {
    			if (document.getElementById("firstName").value == "") {
				$("#errormsg_firstName").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_firstName").text("");
				}	
			}

			function lastNameFunction() {				
    			if (document.getElementById("lastName").value == "") {
				$("#errormsg_lastName").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_lastName").text("");
				}
			}

			function passwordFunction() {
    			if (document.getElementById("password").value == "") {
					$("#errormsg_password").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_password").text("");
				}
			}

			function confirmPasswordFunction() {
				if (document.getElementById("confirmPassword").value == "") {
					$("#errormsg_confirmPassword").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_confirmPassword").text("");
				}
				
				if (document.getElementById("confirmPassword").value != document.getElementById("password").value) {
					$("#errormsg_confirmPassword").text("These passwords don't match. Try again?");
				}
			}
			
			function DOBFunction() {
				if (document.getElementById("datepicker").value == "") {
				$("#errormsg_DOB").text("Please select your date of birth.");
				}
				else{
					$("#errormsg_DOB").text("");
				}
			}
			
			function occupationFunction() {
				if (document.getElementById("occupation").value == "") {
				$("#errormsg_occupation").text("You can't leave this empty.");
				}
				else{
					$("#errormsg_occupation").text("");
				}
			}
			
			
			
			//Submit function
			function submitFunction(){
			
			$('#registerForm').submit(function() {
			var a = true;
			
			//FirstName
    			if (document.getElementById("firstName").value == "") {
				document.getElementById("errormsg_firstName").style.display = "block";
				a=false;
				}
				else{
					document.getElementById("errormsg_firstName").style.display = "none";
				}
				
			//LastName			
    			if (document.getElementById("lastName").value == "") {
				document.getElementById("errormsg_lastName").style.display = "block";
				a=false;
				}
				else{
					document.getElementById("errormsg_lastName").style.display = "none";
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


	
			
			
				
