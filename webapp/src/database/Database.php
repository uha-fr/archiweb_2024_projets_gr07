<?php

namespace webapp\database;

use mysqli;
use webapp\exception\DBConfigFileException;

class Database {

    private static $instance;

    private $connection;

    private $configFile;

    private function __construct() {
        // default path of the database configuration file
        $this->configFile = realpath($_SERVER['DOCUMENT_ROOT'] . '/archiweb_2024_projets_gr07/webapp/db/database.conf');
    }


    public static function getInstance($configFile="") {
        if (self::$instance === null) {
            self::$instance = new Database($configFile);
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function connect($confFile="") {

        if (file_exists($confFile)) {
            $this->configFile = $confFile;
        }

        // Read the config file
        $lines = file($this->configFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $config = [];

        foreach ($lines as $line) {
            list($key, $value) = explode('=', $line);
            $config[trim($key)] = trim($value);
        }

        // if the file is not formatted correctly
        if (!array_key_exists('host', $config)
            || !array_key_exists('username', $config)
            || !array_key_exists('password', $config)
            || !array_key_exists('database', $config)
        ){
            throw new DBConfigFileException();
        }

        $servername = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];

        // enable error handling for mysqli
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->connection = new mysqli($servername, $username, $password, $database);
    }

    public function disconnect() {
        $this->connection->close();
    }

}