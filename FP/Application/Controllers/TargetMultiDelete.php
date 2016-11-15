<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit1"]))
{
  if(isset($_POST["num"])){
      $box = $_POST["num"];
    while (list ($key,$val) = @each ($box))
  {
    $sql = "DELETE FROM target WHERE Target_ID =$val";
    $result = $conn->query($sql);
    echo "$val ";
    echo "is deleted successfuly";
    echo "<br>";
    echo "<br>";
  }

}else{
   header("Location:../Views/targetDisplay.php");
 }
  echo "<a href=\"../Views/targetDisplay.php\">Back</a>";
}
