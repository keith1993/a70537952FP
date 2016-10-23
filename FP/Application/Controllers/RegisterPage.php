<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22-10-16
 * Time: 10:48 AM
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

$a = new CountriesModel();
$countryArray =$a->getCountriesInArray();

require "../Views/register.html";