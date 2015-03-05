<?php

define('DEBUG', true);
define('AUTOLOAD', true);
define('BASENAME', 'http://hack-commerce.local/');
define('DOCUMENT_ROOT', dirname(__FILE__) . '/../'); # default $_SERVER['DOCUMENT_ROOT']

// database
define('DDBB_NAME', 'websecurity');
define('DDBB_USER', 'root');
define('DDBB_PASS', '1234');
define('DDBB_HOST', 'localhost');

// cookies
define('SESSION_LIFETIME', 3600);
define('SESSION_PATH', '/');
define('SESSION_DOMAIN', 'localhost');
define('SESSION_SECURE', false);
define('SESSION_HTTPONLY', false); // only PHP >= 5.2.0

// enable extra debug information
if(DEBUG === true) {
    ini_set('error_reporting', -1);
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}


// load session manager and init guest session
require_once DOCUMENT_ROOT . 'core/session/session.php';
require_once DOCUMENT_ROOT . 'core/models/user_model.php';
$user = UserModel::getUser();