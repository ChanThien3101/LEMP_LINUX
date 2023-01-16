<?php

class Session
{

    public static function init()
    {
        session_start();
    }

    // luu ss
    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    // lay ss
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession()
    {
        self::init();
        if (self::get('logindn') == false) {
           
            header("Location:" . BASE_URL . "/login");
        }
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function unset($key)
    {
        unset($_SESSION[$key]);
    }
}
?>