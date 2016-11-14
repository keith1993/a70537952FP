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

//define variables and set to empty values
$TargetNameErr = $TargerAmountErr = $TargetDaysErr = "";
$Target_Name = $Target_Amount = $Target_Days = $Target_AchieveDate = "";

//if ($SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["Target_Name"])){
    $TargetNameErr = "Target name is required";
    echo "Target name is required";
    echo "<br>";
    error_reporting(0);
  }else{
    $Target_Name = test_input($_POST["Target_Name"]);
  }

if (empty($_POST["Target_Amount"])) {
    $TargetAmountErr = "Target Amount is required";
    echo "Target Amount is required";
    echo "<br>";
    error_reporting(0);
  }elseif(!is_numeric($_POST["Target_Amount"])) {
    echo "Data entered was not numeric";
    echo "<br>";
    $msg = '<span class="error"> Data entered was not numeric</span>';
    error_reporting(0);
  }
     else {
    $Target_Amount = test_input($_POST["Target_Amount"]);
  }

  if (empty($_POST["Target_AchieveDate"])) {
      $TargetDaysErr = "Target Achieve Days is required";
      echo "Target Achieve Days is required";
      echo "<br>";
      error_reporting(0);
    }elseif ($_POST["Target_AchieveDate"] < date("Y-m-d")) {
      echo "Please insert a date exceed Today's Date";
      echo "<br>";
      error_reporting(0);
    } else {

      $now = time(); // or your date as well
      $your_date = strtotime($_POST["Target_AchieveDate"]);
      $datediff = $your_date - $now;
      $answer = ($datediff / (60 * 60 * 24));

      $Target_AchieveDate = test_input($_POST["Target_AchieveDate"]);
      $Target_Days = test_input($answer);

      //calculate perday
      $TargetPerDay = $Target_Amount/$Target_Days;
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
//}
$a = new UserTargetModel();
$jj = $a->addTarget("007",$Target_Name,$Target_Amount,$Target_Days,$Target_AchieveDate);


/*
$Target_Name = $_POST["Target_Name"];
$Target_Amount = $_POST["Target_Amount"];
$Target_Days = $_POST["Target_Days"];

$a = new UserTargetModel();
$jj = $a->addTarget("007",$Target_Name,$Target_Amount,$Target_Days);

 if($jj instanceof UserTargetObject){

     echo "Insert Target Success";
    }else{
        echo "Error!". mysql_error();
    }

	//$UserID,$Target_Name,$Target_Amount,$Target_Days
*/
//display the input
  echo "Your have inserted ";
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
  echo "<a href=\"../Views/target.php\">Back</a>";



?>
