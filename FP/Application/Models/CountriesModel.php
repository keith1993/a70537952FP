<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22-10-16
 * Time: 10:50 AM
 */
class CountriesModel extends BaseModel
{

    public function getCountriesInArray()
    {
        $sql = "select * from countries" ;
        $result = self::$conn->prepare($sql);
        $result->execute();
        $result = $result->fetchAll();
        $countriesArray = Array();
        foreach ($result as $key => $value) {

            $countriesArray[]=$value[0];
        }
        return $countriesArray;
    }
}