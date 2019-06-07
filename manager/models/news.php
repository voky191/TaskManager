<?php

class News
{
  public static function getNewsItemById($id)
  {

      $id = intval($id);

      if($id)
      {
          $db = Db::getConnection();
          $result = $db->query('SELECT * from tasks WHERE id = '.$id);


          $newsItem = $result->fetch();

          return $newsItem;

      }

  }

  public static function getNewsList()
  {
      $db = Db::getConnection();

    $newsList = array();

    $result = $db->query('SELECT id, name, mail, text, image, status FROM tasks');

    $i = 0;
    while($row = $result->fetch())
    {
        $newsList[$i]['id'] = $row['id'];
        $newsList[$i]['name'] = $row['name'];
        $newsList[$i]['mail'] = $row['mail'];
        $newsList[$i]['text'] = $row['text'];
        $newsList[$i]['image'] = $row['image'];
        $newsList[$i]['status'] = $row['status'];
        $i++;
    }

    return $newsList;

  }
}