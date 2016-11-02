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

<!--Progress bar-->
    <div id="myProgress">
      <div id="myBar">
        <div id="percentage">10%</div>
      </div>
    </div>
    <button onclick="move()">Click Me</button>

<!--Progress bar ends dd-->
      <p><a href="javascript:void(0)" onclick="toggle_visibility('popup1');">Add Target</a></p>





<script src="../../Public/js/target.js"></script>
  </body>
</html>
