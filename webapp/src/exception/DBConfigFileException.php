<?php

namespace webapp\exception;

class DBConfigFileException extends \Exception {

    public function __construct($message = "File with incorrect content : ", $code = 1, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": The database configuration file is not structured correctly. Please refer to the file README.md to find a template of this configuration file.";
    }
}