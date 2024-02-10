<?php

namespace webapp\model;

use webapp\database\Database;

abstract class Model {

    private $selectClause;
    private $whereClauses;
    private $OrWhereClauses;
    private $requestParams;

    private $isSelected;

    protected $id;

    private static $PROPERTIES_LIST = array(
        'selectClause',
        'whereClauses',
        'OrWhereClauses',
        'requestParams',
        'isSelected',
        'id'
    );

    public function __construct() {
        $this->id = -1;

        $this->selectClause = "";
        $this->whereClauses = array();
        $this->OrWhereClauses = array();
        $this->requestParams = array();

        $this->isSelected = false;
    }

    public function save() {
        // get all properties of the class (subclass of "Model")
        $properties = get_object_vars($this);

        // store the property names of the class in columns and their value
        $columns = array();
        $values = array();
        foreach ($properties as $key => $value) {
            // ignore properties specific to the parent abstract class "Model"
            if (!in_array($key, self::$PROPERTIES_LIST)) {
                array_push($columns, $key);
                array_push($values, $value);
            }
        }

        $set = array();
        foreach ($columns as $column) {
            array_push($set, $column.' = ?');
        }
        // elements of the array are put into one string, separate with ', '
        $setClause = implode(', ', $set);

        $sql = '';
        // if new object, insert a row into the table with the properties of this object
        if ($this->id === -1) { 
            $sql = 'INSERT INTO '.static::getTableName().' SET '.$setClause;
        } 
        // if the object already exist in the database, 
        //   update the corresponding row
        else {  
            $sql = 'UPDATE '.static::getTableName().' SET '.$setClause.' WHERE id = ?';
            array_push($values, $this->id);
        }

        $con = Database::getInstance()->getConnection();
        $statement = $con->prepare($sql);

        $paramTypes = $this->getBindParamTypes($values);
        $statement->bind_param($paramTypes, ...array_values($values));

        $statement->execute();
        $this->id = $statement->insert_id;
        $statement->close();
    }

    public function delete() {
        if ($this->id === -1)
            return 0;

        $con = Database::getInstance()->getConnection();    
        $sql = 'DELETE FROM '.static::getTableName().' WHERE id=?';

        $statement = $con->prepare($sql);
        $statement->bind_param('i', $this->id);

        $statement->execute();
        $statement->close();
    }

    public static function getAll() {
        $con = Database::getInstance()->getConnection();    

        $statement = $con->prepare('SELECT * FROM '.static::getTableName());
        $statement->execute();
        $res = $statement->get_result();
        $statement->close();

        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($id) {
        $con = Database::getInstance()->getConnection();

        $statement = $con->prepare('SELECT * from '.static::getTableName().' WHERE id=?');
        $statement->bind_param("i", $id);
        $statement->execute();
        $res = $statement->get_result();
        $statement->close();

        return $res->fetch_assoc();
    }

    public static function select($select) {
        $instance = new static();
        $instance->selectClause = $select;
        $instance->isSelected = true;
        return $instance;
    }

    public function where($attribute, $operator, $param) {
        array_push($this->whereClauses, array(
            "attribute" => $attribute,
            "operator" => $operator
        ));
        array_push($this->requestParams, $param);
        return $this;
    }

    public function orWhere($attribute, $operator, $param) {
        array_push($this->OrWhereClauses, array(
            "attribute" => $attribute,
            "operator" => $operator
        ));
        array_push($this->requestParams, $param);
        return $this;
    }

    public function get() {        
        if (!$this->isSelected)
            return array();
        $this->isSelected = false;

        $sql = 'SELECT '.$this->selectClause.' from '.static::getTableName();

        // add WHERE clauses to the request if needed
        if (!empty($this->whereClauses) || !empty($this->OrWhereClauses)) {
            $coditions = $this->concatenateWhereClauses($this->whereClauses, 'AND');
            $coditions .= $this->concatenateWhereClauses($this->OrWhereClauses, 'OR');

            // replace the first 3 characteres by WHERE
            $sql .= substr_replace($coditions, ' WHERE ', 0, 3);
        }

        $con = Database::getInstance()->getConnection();
        $statement = $con->prepare($sql);

        // bind request parameters if needed
        if (!empty($this->requestParams)) {
            $paramTypes = $this->getBindParamTypes($this->requestParams);
            $statement->bind_param($paramTypes, ...array_values($this->requestParams));    
        }        

        $statement->execute();
        $res = $statement->get_result();
        $statement->close();
        return $res->fetch_assoc();
    }

    public function setPropertiesFromData($data) {
        if ($data === null)
            return;

        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    private function concatenateWhereClauses($whereClauses, $boolOperator) {
        $stmtConditions = '';
        if (!empty($whereClauses)) {
            foreach ($whereClauses as $condition) {
                $stmtConditions .= $boolOperator.' '.$condition['attribute'].$condition['operator'].'? ';
            } 
        }
        return $stmtConditions;
    }

    private function getBindParamTypes($params) {
        $sqlTypeFromPhpType = function ($param) {
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
        };

        $bindType = '';
        foreach ($params as $param) {
            $bindType .= $sqlTypeFromPhpType($param);
        }
        return $bindType;

    }

    abstract protected static function getTableName();

}