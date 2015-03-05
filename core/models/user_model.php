<?php

if(!defined('AUTOLOAD')) {
    die('Direct access is not allowed');
}

require_once DOCUMENT_ROOT . 'core/database/connection.php';
require_once DOCUMENT_ROOT . 'core/session/session.php';

class UserModel
{
	// return the current user or create and return a guest user
	public static function getUser()
	{
		$session = Session::getInstance();
		$user = $session->getFromSession('user');

		if(is_null($user)) { // create guest user like a real user but empty fields
			$user = self::_changeCurrentUser();
		}

		return $user;
	}

	public static function closeSession()
	{
		return self::_changeCurrentUser();
	}

	// login the user (change guest to current login user)
	private static function _changeCurrentUser($email='', $password='', $isGuest=true)
	{
		$session = Session::getInstance();

		$user = new stdClass;
		$user->email = $email;
		$user->password = $password;
		$user->isGuest = $isGuest;

		$session->add2Session('user', $user);

		return $session->getFromSession('user');
	}

	public static function login($email, $password)
	{
		$user = self::getUser();

		if($user->isGuest === false) {
			return $user;
		}

		$connection = Connection::getInstance();
		$query = "SELECT email, password 
			FROM users 
			WHERE email = '{$email}' 
				AND password = '{$password}'";

		$userSearch = $connection->doOneSelect($query);

		if(!is_null($userSearch)) { // enable default user (session)
			$user = self::_changeCurrentUser($userSearch->email, $userSearch->password, false);
		}

		return $user;
	}

	// login POC to demonstrate a real web app login
	public static function realLogin($email, $password)
	{
		$user = self::getUser();

		if($user->isGuest === false) {
			return $user;
		}
		
		$connection = Connection::getInstance();
		$email = $connection->escapeString($email);
		$password = $connection->escapeString($password);

		// SELECT SHA1(CONCAT('1234', 'WIz:save56OCa95AcES&'));

		$query = "SELECT email, password 
			FROM admins 
			WHERE email = '{$email}' 
				AND password = SHA1( CONCAT({$password}, salt) )";

		$userSearch = $connection->doOneSelect($query);
		$user = null;

		if(!is_null($userSearch)) { // enable default user (session)
			$user = self::_changeCurrentUser($userSearch->email, $userSearch->password, false);
		}

		return $user;
	}

	public static function findUserByEmail($email) 
	{
		$connection = Connection::getInstance();
		$email = $connection->escapeString($email);

		$query = "SELECT * FROM customers WHERE email = '{$email}'";

		return $connection->doOneSelect($query);
	}
}