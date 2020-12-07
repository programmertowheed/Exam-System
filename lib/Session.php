<?php
/**
*Session class 
*/

class Session{
	public static function init(){
		session_start();
	}
	
	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}
	
	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}
	
	public static function checkSession(){
		self::init();
		if(self::get("examuserlogin")==false){
			self::destroy();
		}
	}
	
	public static function checkSessionAdmin(){
		self::init();
		if(self::get("examadminlogin")==false){
			self::destroyAdmin();
		}
	}

	public static function checkLogin(){
		if(self::get("examuserlogin")==true){
			header("Location:home.php");
		}
	}

	public static function checkLoginAdmin(){
		if(self::get("examadminlogin")==true){
			header("Location:index.php");
		}
	}

	public static function checkLoginresetpass(){
		if(self::get("examuserlogin")==true){
			header("Location:./../index.php");
		}
	}

	public static function checkLoginresetpassAdmin(){
		if(self::get("examadminlogin")==true){
			header("Location:./../index.php");
		}
	}
	
	public static function destroyAdmin(){
		//session_destroy();
		unset($_SESSION['examadminlogin']);
		unset($_SESSION['examadminemail']);
		unset($_SESSION['examadminuserId']);
		header("Location:login.php");
		exit();
	}
	
	public static function destroy(){
		//session_destroy();
		unset($_SESSION['examuserlogin']);
		unset($_SESSION['examuserauth']);
		unset($_SESSION['examuseremail']);
		unset($_SESSION['examuserId']);
		header("Location:index.php");
		exit();
	}

	
}


?>