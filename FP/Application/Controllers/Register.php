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

$email = $_POST["email"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$password = $_POST["password"];
$options = $_POST["options"];
$DOB = $_POST["DOBDay"]."/".$_POST["DOBMonth"]."/".$_POST["DOBYear"];
$country = $_POST["country"];
$occupation = $_POST["occupation"];



$a = new UserModel();
$jj = $a->Register($firstName,$lastName,$password,$DOB,$options,$email,$country,$occupation);

 if($jj){
	$user = $a->getUserByEmail($email);
	$id = $user->ID;
	$token = $user->Token;
$email= $user->Email;

	$z = new EmailTo("Cornucopia","Email Verification",$email,$firstName.$lastName,
        "http://localhost/FP/Application/Controllers/VerifyEmail.php?I=$id&T=$token");
	$isSuccess = $z->send();

		if($isSuccess){
			header('Location: ../Views/registerSuccess.html');
		}else{
 			echo "error";
		}
        
    }else{
        echo "Error!". mysql_error();
    }

/*$FirstName, $LastName, $Password, $DOB, $Gender, $Email,
                             $Country, $LastLoginIP,$Occupation)*/