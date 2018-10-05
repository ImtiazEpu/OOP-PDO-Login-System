<?php
class Session {
    public static function init() {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }


    public static function ckeckSession(){
    	if (self::get("login")==false) {
    		echo "<script type='text/javascript'>window.top.location='login.php';</script>";
    	}
    }

     public static function ckeckLogin(){
    	if (self::get("login")==true) {
    		echo "<script type='text/javascript'>window.top.location='index.php';</script>";
    	}
    }


    public static function destroy(){
    	session_destroy();
    	session_unset();
    	echo "<script type='text/javascript'>window.top.location='login.php';</script>";
    }
}

?>