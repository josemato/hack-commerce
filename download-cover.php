<?php

require_once 'core/autoload.php';
require_once DOCUMENT_ROOT . 'core/session/session.php';

// check if there is some file
if(!isset($_GET['file'])) {
	Session::addFlashMessage('Cover not found!');
	header("Location: index.php");
	exit;
}

// check file path if exist
$filePath = DOCUMENT_ROOT . 'uploads/cover/' . $_GET['file'];
if(!file_exists($filePath)) {
	Session::addFlashMessage('Cover not found!!');
	header("Location: index.php");
	exit;
}

$content = file_get_contents($filePath);
$filesize = filesize($filePath);
$filename = $_GET['file'];

header("Content-type: image/jpeg");
header("Content-Disposition: attachment; filename=\"{$filename}\"");
header("Content-length: {$filesize}");
header("Cache-control: private");

echo $content;
exit;