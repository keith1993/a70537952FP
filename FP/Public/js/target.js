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
