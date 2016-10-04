<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03-10-16
 * Time: 7:25 PM
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
//$ID = $_GET["I"];
//$Token = $_GET["T"];

//$ID = 14;
//$Token = "2b3b9969209e4e4518b442d1a5fdf595";


$a = new UserModel();
$result = $a->Verify($ID,$Token);

if($result ){

            echo "激活成功！";

}else{
    echo '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
}


