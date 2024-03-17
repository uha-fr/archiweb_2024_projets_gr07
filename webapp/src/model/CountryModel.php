<?php

namespace webapp\model;

class CountryModel extends Model {
    
    protected static function getTableName() {
        return 'country'; 
    }
    public static function getCountry($name) {
        return  self::select('id')->where('name', '=', $name)->get()[0]['id'];
    }
    public static function getCountryName($id) {
        return  self::select('name')->where('id', '=', $id)->get()[0]['name'];
    }
    public static function getCountriesNames() {
        return  self::select('name')->get();
    }

}

?>
