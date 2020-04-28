<?php
    ob_start();
    ini_set('display_errors','1');
	include "./../../lib/Session.php";
	Session::checkSessionAdmin();
?>
<?php
	include "./../../lib/Database.php";
	include "./../../helpers/Format.php";
?>
<?php
	$db = new Database();
	$fm = new Format();
?>