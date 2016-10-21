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


//$UserID = $_SESSION["id"];
session_start();
$FirstName = $_POST["firstName"];
$LastName = $_POST["lastName"];
$DOB = $_POST["dob"];
$Gender = $_POST["gender"];
$Country= $_POST["country"];
$Occupation = $_POST["occupation"];
$AboutMe = $_POST["aboutme"];

//$UserID, $FirstName, $LastName, $DOB, $Gender,
                                       //$Country, $Occupation, $AboutMe0

$a = new UserModel();
$jj = $a->updateUserByUserID( $_SESSION["id"],$FirstName,$LastName,$DOB,$Gender,$Country,$Occupation,$AboutMe);

 if($jj){

     header("Location:UserProfile.php");
		}else{
        echo "Error!". mysql_error();
    }
