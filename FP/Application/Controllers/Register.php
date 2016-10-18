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
$link = "http://localhost/GithubFP/Application/Controllers/VerifyEmail.php?I=$id&T=$token";

     $message = "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">


        <title>Email Verification</title>

        <!-- JS -->


        <!-- CSS -->





        <!-- Favicon and touch icons -->

    </head>
    <body style=\"margin: 0;font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;\">

        <!-- Home -->
        <section id=\"templatemo_home\" style=\"background: #154558 url(http://dololo.eregardless.co.za/images/jumbo_background.jpg) ;
    background-size: cover;
    min-height: 70vh;
    padding-bottom: 130px;
    color: #fff;\">
            <div class=\"container\">
                <div class=\"templatemo_home_inner_wapper\"><h4 class=\"text-center\"style=\"font: normal normal 100 27px/35px 'Fira Sans', sans-serif;margin: 0px;text-align: center;
padding-top: 220px;padding-bottom: 30px;\">Email Verification</h4>

                <center><i class=\"fa fa-envelope-o\" id=\"Mail\" aria-hidden=\"true\"style=\"
    font-size: 80px;display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;\"></i>
                    <h5 class=\"text-center\" style=\"    font: normal normal 100 20px/30px 'Fira Sans', sans-serif;
    margin-bottom: 10px;\">Please click the following link to verify your account</h5>
                    <p><a href=\"$link\" style=\"font-size: 35px;color: #1de9b6\">Click</a></p>
                    </center>
                </div>
                <div class=\"templatemo_home_inner_wapper btn_wapper\">
                 </div>
             </div>
         </section>

    </body>
</html>";

	$z = new EmailTo("Cornucopia","Email Verification",$email,$firstName.$lastName,
        $message);



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