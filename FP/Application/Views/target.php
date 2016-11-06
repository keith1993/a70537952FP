<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../../Public/css/target.css">

</head>
  <body>

    <div id="popup1" class="popup-position">
        <div id="popup-wrapper">
          <div id="popup-container">

            <p><span class="error">* required field.</span></p>

        <!--../Controllers/TargetInsert.php-->
              <form action="../Controllers/TargetInsert.php" method="post">
            <table>
              <tr>
                <td>
                  Target Name:
                </td>
                <td>
                  <input type="text" name="Target_Name">
                </td>
              </tr>
              <tr>
                <td>
                  Target Amount:
                </td>
                <td>
                  <input type="text" name="Target_Amount">
                </td>
              </tr>
              <tr>
                <td>
                  Target Achieve Date:
                </td>
                <td>
                  <input type="date" name="Target_AchieveDate" id="Target_AchieveDate" onfocus="dateDiff()">
                </td>
              </tr>
              <!-- no use for showing textbox
              <tr>
                <td>
                  Target Days:
                </td>
                <td>
                  <input type="text" name="Target_Days" id="Target_Days">
                </td>
              </tr>
            -->
            </table>
              <input type="submit">
              </form>
              <a href="javascript:void(0)"onclick="toggle_visibility('popup1');">Close</a>

          </div><!--popup_container ends-->
        </div><!--popup-wrapper ends-->
    </div><!--popup1 ends-->


    <!--Progress Bar new-->
    <style type="text/css">
      .outter{
        height:25px;
        width:500px;
        border:solid 1px #000;
      }
      .inner{
        height:25px;
        border-right:solid 1px #000;
        background-color: lightblue;
      }
    </style>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Finance";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Target_EnterDate, Target_Days, Target_Name FROM target";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Target_Name: " . $row["Target_Name"];
        echo "</br>";
        echo "Target_EnterDate: " . $row["Target_EnterDate"];
        echo "</br>";
        echo " Target_Days: " . $row["Target_Days"]. "<br>";
        echo "Today: ";
        echo date("Y-m-d");
        echo "<br>";
        $Target_EnterDate = strtotime($row["Target_EnterDate"]);
        $today = time();
        $datediff = $today - $Target_EnterDate;
        $answer = round(($datediff / (60 * 60 * 24)),1);
        $Target_Days = $row["Target_Days"];
        $percent = round(($answer/$Target_Days) * 100,1);
        echo "Days Difference: $answer days";
        echo "<br>";
        echo "Percentage: $percent%";
        echo "<br>";
        echo "<div class=\"outter\">";
        //echo "<div class=\"inner\">" ;
        echo "<div class=\"inner\"  style=\"width:";
        echo $percent;
        echo "%";
        echo ";\">";
        echo "</div>";
        echo "</div>";

    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
    <!--Progress Bar new ends-->

      <p><a href="javascript:void(0)" onclick="toggle_visibility('popup1');">Add Target</a></p>

<script src="../../Public/js/target.js"></script>
  </body>
</html>
