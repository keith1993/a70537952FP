			
			function emailFunction() {
   				var x = document.getElementById("email");
    			if (x.value == "") {
				$("#errormsg_email").text("You can't leave this empty.");
				}
				
			}
			
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
			
			
			function submitFunction(){
			
			$('#registerForm').submit(function() {
			var a = true;
			
			//FirstName
			document.getElementById("firstName");
    			if (document.getElementById("firstName").value == "") {
				document.getElementById("errormsg_firstName").style.display = "block";
				a=false;
				}
				else{
					document.getElementById("errormsg_firstName").style.display = "none";
				}
				
			//LastName
			document.getElementById("lastName");
				
    			if (document.getElementById("lastName").value == "") {
				document.getElementById("errormsg_lastName").style.display = "block";
				a=false;
				}
				else{
					document.getElementById("errormsg_lastName").style.display = "none";
				}
    if (a){
    return true; // return false to cancel form action
	}
	else{
		return false;
	}
});

			}


	
			
			
				
