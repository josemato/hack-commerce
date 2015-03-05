<?php

require_once 'core/autoload.php';
require_once DOCUMENT_ROOT . 'core/session/session.php';
require_once 'core/models/user_model.php';

if( !isset( $_POST['email'], $_POST['password']) ) {
	Session::addFlashMessage('Wrong username or password');
} else {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$user = UserModel::login($email, $password);

	if($user->isGuest === true) {
		Session::addFlashMessage('Wrong username or password');
	}
}

header("Location: index.php");
exit;
