<?php

if(!defined('AUTOLOAD')) {
    die('Direct access is not allowed');
}

class Connection
{
    private static $_host = null;
    private static $_ddbb = null;
    private static $_user = null;
    private static $_pass = null;

    private $_link = null;
    private static $_connection = null;

    private function __construct($host=null, $ddbb=null, $user=null, $pass=null)
    {
        self::$_host = $host ? $host : DDBB_HOST;
        self::$_ddbb = $ddbb ? $ddbb : DDBB_NAME;
        self::$_user = $user ? $user : DDBB_USER;
        self::$_pass = $pass ? $pass : DDBB_PASS; 

        if(!$this->_link) {
            $this->_connect();
        }
    }

    private function _connect()
    {
        $this->_link = new mysqli(self::$_host, self::$_user, self::$_pass, self::$_ddbb);

        if($this->_link->connect_error) {
            die("Connection error: {$mysqli->connect_errno} -> {$mysqli->connect_error}");
        }
    }

    public static function getInstance($host=null, $ddbb=null, $user=null, $pass=null)
    {
        if(!self::$_connection) {
            self::$_connection = new Connection;
        }

        return self::$_connection;
    }

    public function doSelect($query)
    {
        $data = array();
        $result = $this->_link->query($query);

        if($result) {
            while(($object = $result->fetch_object())) {
                $data[] = $object;
            }

            $result->close();
        }

        return $data;
    }

    public function doOneSelect($query)
    {
        $data = null;
        $result = $this->_link->query($query);

        if($result) {
            $data = $result->fetch_object();

            $result->close();
        }

        return $data;
    }

    public function escapeString($value)
    {
        return $this->_link->real_escape_string($value);
    }
}