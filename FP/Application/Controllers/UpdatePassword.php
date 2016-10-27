<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27-10-16
 * Time: 2:54 PM
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

session_start();
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];

if (isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {

    $a = new UserModel();
    $jj = $a->Login($_SESSION["email"], $_SESSION["password"], $_SERVER["REMOTE_ADDR"]);

    if ($jj instanceof UserObject) {

        $result = $a->ChangePassword($_SESSION["id"], $oldPassword, $newPassword);
        if ($result == 1) {

            $_SESSION["password"] = $newPassword;
            header("Location: UserProfile.php?a=updatePasswordSuccess");
        } else {
            header("Location: UserProfile.php?a=updatePasswordFailed");

        }




    } else {
        echo "Error!" . mysql_error();
        session_unset();
        session_destroy();
        require 'Application/Views/index.html';
    }

// echo "已登录";
} else {
    session_unset();
    session_destroy();
    require 'Application/Views/index.html';
    // echo "未登录";
    //echo "请重新登录";
}