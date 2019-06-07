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

          echo '<pre>';
          print_r($newsItem);
          echo '</pre>';

          echo 'actionView';

        }
        return true;
    }

}