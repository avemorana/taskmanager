<?php

include_once ROOT . '/models/Admin.php';

class AdminController
{
    public function actionLogin()
    {
        $error_message = null;
        $checkLogged = Admin::checkLogged();

        if (isset($_POST["inputSubmitAdm"])) {
            $login = htmlspecialchars($_POST["inputLoginAdm"]);
            $password = htmlspecialchars(($_POST["inputPasswordAdm"]));

            if (Admin::checkLogin($login, $password)) {
                Admin::auth();
                header("Location: http://task-manager.zzz.com.ua/admin");
            } else {
                $error_message = "The data entered is incorrect.";
            }
        }
        require_once ROOT . '/views/admin/login.php';
        return true;
    }
}