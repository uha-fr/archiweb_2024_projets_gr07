<?php

namespace webapp\model;

use webapp\database\Database;

abstract class Model {

    private $SELECT;
    private $WHERE;
    private $OR_WHERE;
    private $requestParams;

    private $isSelected;

    public function __construct() {
        $this->SELECT = "";
        $this->WHERE = array();
        $this->OR_WHERE = array();
        $this->requestParams = array();

        $this->isSelected = false;
    }

    public static function getAll() {
        $con = Database::getInstance()->getConnection();    

        $statement = $con->prepare("SELECT * FROM ".static::getTableName());
        $statement->execute();
        $res = $statement->get_result();
        $statement->close();

        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($id) {
        $con = Database::getInstance()->getConnection();

        $statement = $con->prepare("SELECT * from ".static::getTableName()." WHERE id=?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $res = $statement->get_result();
        $statement->close();

        return $res->fetch_assoc();
    }

    public static function select($select) {
        $instance = new static();
        $instance->SELECT = $select;
        $instance->isSelected = true;
        return $instance;
    }

    public function where($attribut, $operator, $param) {
        array_push($this->WHERE, array(
            "attribut" => $attribut,
            "operator" => $operator
        ));
        array_push($this->requestParams, $param);
        return $this;
    }

    public function orWhere($attribut, $operator, $param) {
        array_push($this->OR_WHERE, array(
            "attribut" => $attribut,
            "operator" => $operator
        ));
        array_push($this->requestParams, $param);
        return $this;
    }

    public function get() {        
        if (!$this->isSelected)
            return array();
        $this->isSelected = false;

        $sql = 'SELECT '.$this->SELECT.' from '.static::getTableName();

        // add WHERE close to the request if needed
        if (!empty($this->WHERE) || !empty($this->OR_WHERE)) {
            $coditions = $this->concatenateWhere($this->WHERE, 'AND');
            $coditions .= $this->concatenateWhere($this->OR_WHERE, 'OR');

            // replace the first 3 characteres by WHERE
            $sql .= substr_replace($coditions, ' WHERE ', 0, 3);
        }

        $con = Database::getInstance()->getConnection();
        $statement = $con->prepare($sql);

        // bind request parameters if needed
        if (!empty($this->requestParams)) {
            $bindType = '';
            foreach ($this->requestParams as $param) {
                $bindType .= $this->getBindParamType($param);
            }
            $statement->bind_param($bindType, ...array_values($this->requestParams));    
        }        

        $statement->execute();
        $res = $statement->get_result();
        $statement->close();
        return $res->fetch_assoc();
    }

    private function concatenateWhere ($whereArray, $boolOperator) {
        $stmtConditions = '';
        if (!empty($whereArray)) {
            foreach ($whereArray as $condition) {
                $stmtConditions .= $boolOperator.' '.$condition['attribut'].$condition['operator'].'? ';
            } 
        }
        return $stmtConditions;
    }

    private function getBindParamType($param) {
        switch (gettype($param)) {
            case 'integer':
                return 'i';
            case 'boolean':
                return 'i';
            case 'double':
                return 'd';
            case 'string':
                return 's';
            default:
                return 's';
        }
    }

    abstract protected static function getTableName();

}