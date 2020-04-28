<?php
	include "lib/Session.php";
	Session::checkSession();
	// unset($_SESSION['login']);
	// unset($_SESSION['auth']);
	// unset($_SESSION['userId']);
	unset($_SESSION);
    session_regenerate_id(true);
	Session::destroy();
?>