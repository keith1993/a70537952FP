//pop up box
function toggle_visibility(id) {
   var e = document.getElementById(id);
   if(e.style.display == 'block')
      e.style.display = 'none';
   else
      e.style.display = 'block';
}
//Pop up box ends
//progress bar
function move() {
   var elem = document.getElementById("myBar");
   var width = 10;
   var id = setInterval(frame, 10);
   function frame() {
     if (width >= 100) {
       clearInterval(id);
     } else {
       width++;
       elem.style.width = width + '%';
       document.getElementById("percentage").innerHTML = width * 1  + '%';
     }
   }
 }

//progress bar ends

       function toggle() {
      	var ele = document.getElementById("updateForm");
      	var text = document.getElementById("displayText");
      	if(ele.style.display == "block") {
          		ele.style.display = "none";
              text.innerHTML = "Enter the Target ID below to DELETE a record";
              document.getElementById("delete").style.display = "block";
              document.getElementById("update").style.display = "none";
              document.getElementById("delete").disabled = false;
              document.getElementById("update").disabled = true;

        	}
      	else {
      		ele.style.display = "block";
          text.innerHTML = "Enter the Target ID and Details below to UPDATE a record";
          document.getElementById("delete").style.display = "none";
          document.getElementById("update").style.display = "block";
          document.getElementById("delete").disabled = true;
          document.getElementById("update").disabled = false;
      	}
      }
