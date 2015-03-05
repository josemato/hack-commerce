<?php

ini_set('error_reporting', -1);
ini_set('display_errors', 1);

$message = null;
$userAdmin = null;

if(isset($_POST['user'], $_POST['password'])) {
	require_once '../core/autoload.php';
	require_once '../core/models/user_model.php';

	$username = $_POST['user'];
	$password = $_POST['password'];

	$userAdmin = UserModel::realLogin($username, $password);

	if(is_null($userAdmin)) {
		$message = 'Acceso no válido';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<style>
		body {
			margin: 0;
		}

		form {
			text-align: left;
		}

		label {
			font-weight: bold;
		}

		input {
			width: 80%;
		}

		label, input {
			display: block;
			width: 100%;
		}
	</style>
</head>
<body>
	<div style="display: flex; flex-flow: row nowrap; height: 100vh; align-items: center; justify-content: center; border: 1px solid grey">
		<div style="vertical-align:middle;text-align:center">
			<h1>Panel de administración</h1>
			<?php if(is_null($userAdmin)): ?>
				<?php if($message): ?>
				<div style="border: 1px solid red">Acceso denegado.</div>
				<?php endif; ?>


				<form method="post" action="index.php">
					<label for="user"><strong>User</strong></label>
					<input id="user" name="user" type="text">
					<br>
					<label for="password"><strong>Password</strong></label>
					<input id="password" name="password" type="password">

					<br>
					<input type="submit" value="Acceder">
				</form>
			<?php else: ?>
				<h1>Gestión de hack commerce</h1>

				<a href="../user-logout.php">Cerrar sesión</a>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>