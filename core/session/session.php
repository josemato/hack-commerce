<?php

class Session
{
    private static $_session = null;

    private function __construct()
    {
        session_set_cookie_params(SESSION_LIFETIME, SESSION_PATH, SESSION_DOMAIN, SESSION_SECURE, SESSION_HTTPONLY);
        session_start();
    }

    public static function getInstance()
    {
        if(is_null(self::$_session)) {
            self::$_session = new Session();
        }

        return self::$_session;
    }

    public function destroySession()
    {

    }

    public static function addFlashMessage($flashMessage)
    {
        $_SESSION['flash_message'] = $flashMessage;
    }

    public static function hasFlashMessage()
    {
        return isset($_SESSION['flash_message']);
    }

    public static function getFlashMessage()
    {
        $message = $_SESSION['flash_message'];

        unset($_SESSION['flash_message']);

        return $message;
    }

    public function add2Session($object, $value)
    {
        $_SESSION[$object] = $obj;
    }

    public function getFromSession($object)
    {
        if(isset($_SESSION[$object])) {
            return $_SESSION[$object];
        } else {
            return null;
        }
    }
}

// create session to visitors (guess or not)
$currentSession = Session::getInstance();