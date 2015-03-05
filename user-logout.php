<?php

require_once 'core/autoload.php';
require_once 'core/models/user_model.php';

if($user->isGuest === false) { // user is login
	UserModel::closeSession();
}

header("Location: index.php");
exit;