//pop up box
function toggle_visibility(id) {
   var e = document.getElementById(id);
   if(e.style.display == 'block')
      e.style.display = 'none';
   else
      e.style.display = 'block';
}
//Pop up box ends

       function toggle() {
      	var ele = document.getElementById("updateForm");
      	var text = document.getElementById("displayText");
      	if(ele.style.display == "block") {
              document.getElementById("updateForm").style.display = "none";
              text.innerHTML = "Enter the Target ID below to DELETE a record";
              document.getElementById("deleteForm").style.display = "block";
              document.getElementById("delete").style.display = "block";
              document.getElementById("update").style.display = "none";
              document.getElementById("delete").disabled = false;
              document.getElementById("update").disabled = true;

        	}
      	else {
          document.getElementById("updateForm").style.display = "block";
          text.innerHTML = "Enter the Target ID and Details below to UPDATE a record";
          document.getElementById("deleteForm").style.display = "none";
          document.getElementById("delete").style.display = "none";
          document.getElementById("update").style.display = "block";
          document.getElementById("delete").disabled = true;
          document.getElementById("update").disabled = false;
      	}
      }
function dateDiff(){

  var msMinute = 60*1000;
  var msDay = 60*60*24*1000;
  var a = new Date(date());
  var b = new Date(document.getElementById("Target_AchieveDate"));

  var answer = (b - a) / msDay;

  document.getElementById("Target_Days").value = answer;
}

        $('.checkbox').click(function() {
            if ($('.checkbox:checked').length > 0) {
                $('#submit1').removeAttr('disabled');
            } else {
                $('#submit1').attr('disabled', 'disabled');
            }
        });

        //when addtarget link is click
