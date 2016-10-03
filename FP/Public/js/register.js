			
			
			
			function firstNameFunction() {
   				var x = document.getElementById("firstName");
    			if (x.value == "") {
				document.getElementById("errormsg_firstName").style.display = "block";
				}
				else{
					document.getElementById("errormsg_firstName").style.display = "none";
				}
			}

			function lastNameFunction() {
   				var x = document.getElementById("lastName");
				
    			if (x.value == "") {
				document.getElementById("errormsg_lastName").style.display = "block";
				}
				else{
					document.getElementById("errormsg_lastName").style.display = "none";
				}
			}

			function passwordFunction() {
   				var x = document.getElementById("password");
				var y = document.getElementById("confirmPassword");
				
    			if (x.value == "") {
					document.getElementById("errormsg_password").style.display = "block";
				}
				else{
					document.getElementById("errormsg_password").style.display = "none";
				}
			}

			function confirmPasswordFunction() {
				var x = document.getElementById("confirmPassword");
				var y = document.getElementById("password");

				if (x.value == "") {
					document.getElementById("errormsg_confirmPassword").style.display = "block";
				}
				else{
					document.getElementById("errormsg_confirmPassword").style.display = "none";
					document.getElementById("errormsg_confirmPasswordNotMatch").style.display = "none";
				}
				
				if (x.value != y.value) {
					document.getElementById("errormsg_confirmPasswordNotMatch").style.display = "block";
					document.getElementById("errormsg_confirmPassword").style.display = "none";
				}
			}
			
			function DOBFunction() {
				var x = document.getElementById("datepicker");
				
				if (x.value == "") {
				document.getElementById("errormsg_DOB").style.display = "block";
				}
				else{
					document.getElementById("errormsg_DOB").style.display = "none";
				}
			}
			
			function occupationFunction() {
				var x = document.getElementById("occupation");
				
				if (x.value == "") {
				document.getElementById("errormsg_occupation").style.display = "block";
				}
				else{
					document.getElementById("errormsg_occupation").style.display = "none";
				}
			}


	
			
			
				
