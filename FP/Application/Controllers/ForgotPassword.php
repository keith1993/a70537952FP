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
        $Email = new EmailTo("FP", "Password Reset Verification", $user->Email, $user->FirstName, "$VerificationCode");
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