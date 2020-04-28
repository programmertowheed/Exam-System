<?php
	include "./../lib/Session.php";
	Session::checkSessionAdmin();
	unset($_SESSION);
    session_regenerate_id(true);
	Session::destroy();
?>