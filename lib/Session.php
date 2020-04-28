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
		if(self::get("login")==false){
			self::destroy();
		}
	}
	
	public static function checkSessionAdmin(){
		self::init();
		if(self::get("adminlogin")==false){
			self::destroyAdmin();
		}
	}

	public static function checkLogin(){
		if(self::get("login")==true){
			header("Location:home.php");
		}
	}

	public static function checkLoginAdmin(){
		if(self::get("adminlogin")==true){
			header("Location:index.php");
		}
	}

	public static function checkLoginresetpass(){
		if(self::get("login")==true){
			header("Location:./../index.php");
		}
	}

	public static function checkLoginresetpassAdmin(){
		if(self::get("adminlogin")==true){
			header("Location:./../index.php");
		}
	}
	
	public static function destroyAdmin(){
		session_destroy();
		header("Location:login.php");
	}
	
	public static function destroy(){
		session_destroy();
		header("Location:index.php");
	}

	
}


?>