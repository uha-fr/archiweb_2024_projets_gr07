<?php

namespace webapp\model;

class UserTypeModel extends Model {
    
    protected static function getTableName() {
        return 'usertype'; 
    }
    public static function getUserType($label) {
        return self::select('id')->where('label', '=', $label)->get()[0]['id'];
    }

}

?>
