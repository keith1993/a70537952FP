<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25-09-16
 * Time: 2:24 PM
 */

spl_autoload_register(function ($class) {


    if (strpos($class, "Base") === 0) {
        require '../Framework/' . $class . '.php';
    } else if (strpos($class, "Model")) {
        require '../Models/' . $class . '.php';
    } else if (strpos($class, "Object")) {
        require '../Objects/' . $class . '.php';
    }else{
        require "../../Helper/".$class.".php";
    }

});

if (isset($_POST['update'])) {

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

  $Target_ID = $_POST["Target_ID"];

  if (empty($_POST["Target_Name"])){
      echo "Target name is required";
    }else{
      $Target_Name = test_input($_POST["Target_Name"]);
    }

  if (empty($_POST["Target_Amount"])) {
      echo "Target Amount is required";
    } else {
      $Target_Amount = test_input($_POST["Target_Amount"]);
    }

    if (empty($_POST["Target_AchieveDate"])) {
        echo "Target Achieve Days is required";
      } else {

        $now = time(); // or your date as well
        $your_date = strtotime($_POST["Target_AchieveDate"]);
        $datediff = $now - $your_date;
        $answer = (($datediff / (60 * 60 * 24))*-1);

        $Target_AchieveDate = test_input($_POST["Target_AchieveDate"]);
        $Target_Days = test_input($answer);

        //calculate perday
        $TargetPerDay = $Target_Amount/$Target_Days;
      }

  $a = new UserTargetModel();
  $jj = $a->updateTargetByTargetID($Target_ID,$Target_Name,$Target_Amount,$Target_Days,$Target_AchieveDate);

   if($jj instanceof UserTargetObject){

        echo "Update Target Success";
        }else{
          echo "Update Target Success";
          //echo "Error!". mysql_error();
      }

    //$UserID,$Target_Name,$Target_Amount,$Target_Days
    echo "<br>";
    echo "Your have updated ";
    echo $Target_Name;
    echo " ,<br> and planing to save RM ";
    echo $Target_Amount;
    echo " in ";
    echo number_format($answer);
    //echo $answer;
    echo " days.";
    echo "<br>";
    echo " which is until the date of ";
    echo $Target_AchieveDate;
    echo "<br> You will need to save RM ";
    echo number_format($TargetPerDay,2);
    echo " per day";
    echo "<br>";
    echo "<br>";
    echo "<a href=\"../Views/targetDisplay.php\">Back</a>";

    }
