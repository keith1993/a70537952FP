<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08-10-16
 * Time: 9:16 PM
 */

spl_autoload_register(function ($class) {


    if (strpos($class, "Base") === 0) {
        require '../Framework/' . $class . '.php';
    } else if (strpos($class, "Model")) {
        require '../Models/' . $class . '.php';
    } else if (strpos($class, "Object")) {
        require '../Objects/' . $class . '.php';
    } else {
        require "../../Helper/" . $class . ".php";
    }

});
if (isset($_POST["recoveryCode"]) && isset($_POST["Email"])) {
    $recoveryCode = $_POST["recoveryCode"];
    $Email = $_POST["Email"];

    checkRecoveryCode($Email, $recoveryCode);

} else if (isset($_POST["Email"])) {
    $Email = $_POST["Email"];
    verifiedEmail($Email);
}


function verifiedEmail($Email)
{
    $a = new UserModel();
    $user = $a->getUserByEmail($Email);

    if ($user instanceof UserObject) {

        $VerificationCode = $a->setVerificationCode($user->Email);

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
padding-top: 220px;padding-bottom: 30px;\">Recovery Code</h4>

                <center>
                    <h5 class=\"text-center\" style=\"    font: normal normal 100 20px/30px 'Fira Sans', sans-serif;
    margin-bottom: 10px;\">$VerificationCode</h5>
                   
                    </center>
                </div>
                <div class=\"templatemo_home_inner_wapper btn_wapper\">
                 </div>
             </div>
         </section>

    </body>
</html>";

        $Email = new EmailTo("FP", "Password Reset Verification", $user->Email, $user->FirstName, "$message");
        if ($Email->send()) {

            echo "EmailExist";
        }

    } else {

        echo "EmailNoExist";
    }

}

function checkRecoveryCode($Email, $RecoveryCode)
{

    $a = new UserModel();
    $isTrue = $a->checkVerificationCode($Email, $RecoveryCode);
    if ($isTrue) {
        echo "true";

    } else {

        echo "false";
    }


}