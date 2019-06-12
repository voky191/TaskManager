<?php

include_once ROOT.'/models/user.php';

class UserController
{

    public function  actionLogin()
    {

        $name = '';
        $pass = '';
        $result = false;

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $pass = $_POST['password'];

            $errors = false;

            if(!user::checkName($name))
            {
                $errors[] = 'Name should be longer then 2 characters';
            }

            if(!user::checkPass($pass))
            {
                $errors[] = 'Password should be longer then 2 characters';
            }

            $userId = user::checkUserData($name, $pass);

            if($userId == false)
            {
                $errors[] = 'No such user or wrong credentials';
            } else
            {
                user::auth($userId);

                header('Location: /news/');
            }

        }

        require_once (ROOT.'/views/login.php');
    }

    public function actionRegister()
    {
        $name = '';
        $pass = '';
        $result = false;

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $pass = $_POST['password'];

            $errors = false;

            if(!user::checkName($name))
            {
                $errors[] = 'Name should be longer then 2 characters';
            }

            if(!user::checkPass($pass))
            {
                $errors[] = 'Password should be longer then 2 characters';
            }

            if(user::checkNameExists($name))
            {
                $errors[] = 'Such user already exists';
            }

            if($errors == FALSE)
            {
                $result = user::register($name, $pass);
            }

        }

        require_once (ROOT.'/views/register.php');

        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header('Location: /news');
    }
}