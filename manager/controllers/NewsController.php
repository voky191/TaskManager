<?php

include_once ROOT.'/models/news.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = news::getNewsList();

       require_once(ROOT.'/views/index.php');

       /*echo '<pre>';
        print_r($newsList);
        echo '</pre>';
        return true;*/
    }

    public function actionView($id)
    {
        if($id)
        {
          $newsItem = news::getNewsItemById($id);

          /*echo '<pre>';
          print_r($newsItem);
          echo '</pre>';

          echo 'actionView';*/
          require_once(ROOT.'/views/details.php');

        }
        return true;
    }

    public function actionNew()
    {

        if(isset($_POST['submit']))
        {
            //$id = $_POST['id'];
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $text = $_POST['text'];
            $image = $_POST['image'];
            $status = $_POST['status'];
        }

        $result = news::getNewsNew($name, $mail, $text, $image, $status);

        require_once(ROOT.'/views/new.php');
        return true;


    }

    public function actionEdit()
    {
        $task = news::getNewsItemById();

        $name = $task['name'];
        $mail = $task['mail'];
        $text = $task['text'];
        $image = $task['image'];
        $status = $task['status'];



        require_once(ROOT.'/views/edit.php');
        return true;
    }



}