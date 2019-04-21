<?php

class DB {

    private static $host = 'localhost';
    private static $name = '2ch_tasks';
    private static $username = 'root';
    private static $password = '';

    public $mysqli;

    public function __construct() {
        $this->mysqli = $this->connect();
    }

    private function connect() {
        $mysqli = new mysqli(self::$host, self::$username, self::$password, self::$name);

        if ($mysqli->connect_errno) {
            throw new Exception($mysqli->connect_error);
        }

        $mysqli->set_charset('utf8');

        return $mysqli;
    }

}