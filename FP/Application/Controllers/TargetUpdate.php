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

  $Target_ID = $_POST["Target_ID"];
  $Target_Name = $_POST["Target_Name"];
  $Target_Amount = $_POST["Target_Amount"];
  $Target_Days = $_POST["Target_Days"];
  $Target_AchieveDate = $_POST["Target_AchieveDate"];

  $a = new UserTargetModel();
  $jj = $a->updateTargetByTargetID($Target_ID,$Target_Name,$Target_Amount,$Target_Days,$Target_AchieveDate);

   if($jj instanceof UserTargetObject){

       echo "Update Target Success";
      }else{
          echo "Update Target Success";
          //echo "Error!". mysql_error();
      }

    //$UserID,$Target_Name,$Target_Amount,$Target_Days

    }
