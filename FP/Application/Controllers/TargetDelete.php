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
$Target_ID = $_POST["Target_ID"];

$a = new UserTargetModel();
$jj = $a->deleteTargetByTargetID($Target_ID);

 if($jj instanceof UserTargetObject){

     echo "Delete Target Success";
    }else{
      echo "Delete Target Success";
      //  echo "Error!". mysql_error();
    }

	//$UserID,$Target_Name,$Target_Amount,$Target_Days
