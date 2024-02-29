<?php

namespace webapp\model;

class CountryModel extends Model {
    
    protected static function getTableName() {
        return 'country'; 
    }
    public static function getCountry($name) {
        return  self::select('id')->where('name', '=', $name)->get()[0]['id'];
    }

}

?>
