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
  $box = $_POST["num"];
  while (list ($key,$val) = @each ($box))
  {
    $sql = "DELETE FROM target WHERE Target_ID =$val";
    $result = $conn->query($sql);
    echo "$val,";
    echo "is deleted successfuly";
  }
}
