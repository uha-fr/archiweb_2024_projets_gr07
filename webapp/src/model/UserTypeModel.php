<?php

namespace webapp\model;

class UserTypeModel extends Model {
    
    protected static function getTableName() {
        return 'usertype'; 
    }
    public static function getUserTypeID($label) {
        return self::select('id')->where('label', '=', $label)->get()[0]['id'];
    }
    public static function getUserType($id) {
        return self::select('label')->where('id', '=', $id)->get()[0]['label'];
    }

}

?>
