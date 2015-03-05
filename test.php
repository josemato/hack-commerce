<?php

require_once 'core/autoload.php';

?>

<?php ob_start(); ?>
INDEX
<?php $module = ob_get_contents(); ?>

<?php ob_end_clean(); ?>

<?php require_once 'template.php'; ?>