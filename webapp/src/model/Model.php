<?php

namespace webapp\model;

use webapp\database\Database;

class Model {

    public function __construct() {
        
    }

    public function test_DB() {
        $db = Database::getInstance();
        $db->connect();
        $con = $db->getConnection();    

        $sql = "SELECT * FROM ingredient";
        $res = $con->query($sql);

        $data = $res->fetch_all(MYSQLI_ASSOC);
        echo "<pre>";
        print_r($data[0]);
        echo "</pre>";
    }

}