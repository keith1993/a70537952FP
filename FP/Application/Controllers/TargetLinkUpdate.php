<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="../Controllers/TargetUpdate.php" method="post" >
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
      $Target_ID = $_GET["Target_ID"];

      $sql = "SELECT Target_ID, Target_Name, Target_Amount, Target_Days, Target_AchieveDate,Target_EnterDate FROM target WHERE Target_ID = $Target_ID";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $Target_Name = $row["Target_Name"];
      $Target_Days = $row["Target_Days"];
      $Target_Amount = $row["Target_Amount"];
      $Target_AchieveDate = $row["Target_AchieveDate"];
      $Target_EnterDate = $row["Target_EnterDate"];

    }
    } else {
        echo "0 results";
    }
    $conn->close();

      ?>
      <table>
        <tr style="display:none;">
          <td width="100">Target ID</td>
          <td>
            <input name="Target_ID" type="number" id="Target_ID" value="<?php echo $Target_ID; ?>">
          </td>
        </tr>
      <tr>
        <td>
          Target Name:
        </td>
        <td>
          <input type="text" name="Target_Name" value="<?php echo $Target_Name;?>">
        </td>
      </tr>
      <tr>
        <td>
          Target Amount:
        </td>
        <td>
          <input type="text" name="Target_Amount"  value="<?php echo $Target_Amount;?>">
        </td>
      </tr>
      <tr>
        <td>
          Target Achieve Date:
        </td>
        <td>
          <input type="date" name="Target_AchieveDate" value="<?php echo $Target_AchieveDate;?>">
        </td>
      </tr>
      <tr style="display:none;">
        <td>
          Target Days:
        </td>
        <td>
          <input type="text" name="Target_Days" value="<?php echo $Target_Days;?>" >
        </td>
      </tr>
      </table>

      <input name="update" type="submit" id="update" value="Update" >
    </form>

  </body>
</html>
