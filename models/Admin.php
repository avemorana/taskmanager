<?php


class Admin
{
    public static $login = "admin";
    public static $password = "123";

    public static function checkLogin($loginIn, $password)
    {
        if ($loginIn == self::$login and $password == self::$password) {
            return true;
        }
        return false;
    }

    public static function auth()
    {
        $_SESSION["admin"] = true;
    }

    public static function checkLogged()
    {
        session_start();
        if (isset($_SESSION["admin"])) {
            return true;
        }
        return false;
    }

    public static function logout()
    {
        unset($_SESSION["admin"]);
        header("Location: /");
    }


}