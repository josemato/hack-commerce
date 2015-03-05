<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Web Security Commerce</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <base href="<?php echo BASENAME; ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/layout.css">

    <script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
<header>
	<h1><a href="index.php">Online Hack Commerce</a></h1>

	<form id="search-form" method="get" action="search-products.php">
		<input type="text" name="search" placeholder="search by product title">
		<input type="submit" value="Search">
	</form>

	<?php if($user->isGuest): ?>
		<form method="post" action="user-login.php">
			<input type="text" name="email" placeholder="user-email@domain.com">
			<input type="password" name="password" placeholder="My s3cr3t p4ssw0rD">
			<input type="submit" value="login">
		</form>
	<?php else: ?>
		<p>
			Hi <strong><?php echo $user->email; ?></strong> -
			<a href="user-logout.php"><i class="fa fa-user fa-lg"></i> Logout</a>
		</p>
	<?php endif; ?>
</header>

<?php if(isset($_GET['message'])): ?>
<div class="notice">
    <p><?php echo base64_decode($_GET['message']); ?></p>
</div>
<?php endif; ?> <!-- ./notice -->

<?php if(Session::hasFlashMessage()): ?>
<div class="notice">
    <p><?php echo Session::getFlashMessage(); ?></p>
</div>
<?php endif; ?> <!-- ./notice -->

<div id="module-wrapper" class="module">
	<?php if(isset($module)): ?>
		<?php echo utf8_encode($module); ?>
	<?php endif; ?>
</div> <!-- ./module-wrapper -->

<footer>
	&copy; Vulnerable app for fun & no profit - Jose Mato
	<div style="display:none">
		<?php require_once 'test-ads.php'; ?>
	</div>
</footer>

<script src="js/vendor/jquery-1.11.0.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>