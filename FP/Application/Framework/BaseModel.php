<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19-09-16
 * Time: 7:12 PM
 */
class BaseModel
{
    protected static $serverName = "localhost";
    protected static $username = "root";
    protected static $password = "";
    protected static $dbname = "final project";
    protected static $conn;

    function __construct()
    {

        spl_autoload_register(function ($class) {


            if (strpos($class, "Base") === 0) {
                require '../Framework/' . $class . '.php';
            } else if (strpos($class, "Model")) {
                require '../Models/' . $class . '.php';
            } else if (strpos($class, "Object")) {
                require '../Objects/' . $class . '.php';
            }

        });


        try {
            self::$conn = new PDO("mysql:host=" . self::$serverName . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            //echo "Connected Failed";
            echo $e . error_log();
        }

    }


}
