<?php

include_once ROOT.'/models/news.php';
include_once ROOT.'/models/user.php';



class NewsController
{
    public function actionMain()
    {
        $newsList = array();
        $newsList = news::getNewsList();

        $userId = user::checkLogged();

        $user = user::getUserById($userId);

        $_SESSION['user_name'] = $user['name'];

       require_once(ROOT.'/views/main.php');


    }

    public function actionView($id)
    {
        if($id)
        {
          $newsItem = news::getNewsItemById($id);
          require_once(ROOT.'/views/details.php');

        }

        return true;
    }

    public function actionNew()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $text = $_POST['text'];
            $image = $_POST['image'];
            $status = $_POST['status'];

            $result = news::getNewsNew($name, $mail, $text, $image, $status);



            header("Location:/news");
        }

        require_once(ROOT.'/views/new.php');
        return true;


    }

    public function actionEdit($id)
    {
        if($_SESSION['user_name']=='admin')
        {
            if(isset($_POST['submit'])) {
                $newsItem = news::getNewsItemById($id);
                $result = news::editTask($id);
            }
        }

        require_once(ROOT . '/views/edit.php');

        return true;

    }



}