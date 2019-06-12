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

    public static function getNewsNew($name, $mail, $text, $image, $status)
    {
        $db = Db::getConnection();
        $sqlquery = 'INSERT INTO tasks (name,mail,text,image,status) VALUES (:name,:mail,:text,:image,:status)';
        $result = $db->prepare($sqlquery);
        // $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':mail', $mail, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }

    public static function editTask($id)
    {
        $db = Db::getConnection();
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $des = $_POST['text'];
        $img = $_POST['image'];
        $stat = $_POST['status'];
        $result = $db->query("Update tasks SET name='$name',mail='$email',text='$des', image='$img',status='$stat' where id=$id");
        return $result;

    }
}