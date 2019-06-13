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
        $filePath  = $_FILES['image']['tmp_name'];

        $fi = finfo_open(FILEINFO_MIME_TYPE);

        $mime = (string) finfo_file($fi, $filePath);

        finfo_close($fi);

        if (strpos($mime, 'image') === false) die('Only images are allowed!');

        $image = getimagesize($filePath);

        $pname = md5_file($filePath);

        $extension = image_type_to_extension($image[2]);

        $format = str_replace('jpeg', 'jpg', $extension);

        if (!move_uploaded_file($filePath, ROOT . '/images/' . $pname . $format)) {
            die('Upload on disk error.');
        }

        $pic = $pname.$format;

        if($format=='.png'){
            $im = imagecreatefrompng( ROOT.'/images/'.$pic );
        } else $im=imagecreatefromjpeg(ROOT.'/images/'.$pic);

        $width = imagesx($im);
        $height = imagesy($im);

        $scalingFactor = 200 / $width;

        $newImageHeight = $height * $scalingFactor;

        $im1=imagecreatetruecolor(200, $newImageHeight);

        if($format=='.png')
        {
            imagealphablending( $im1, false );
            imagesavealpha( $im1, true );
        }

        imagecopyresampled($im1,$im,0,0,0,0,200,$newImageHeight,$width,$height);
        if($format!='.png') {
            imagejpeg($im1, ROOT . '/images/' . $pic);
        }
        else imagepng($im1, ROOT . '/images/' . $pic, 9);


        imagedestroy($im);
        imagedestroy($im1);

        $db = Db::getConnection();
        $sqlquery = 'INSERT INTO tasks (name,mail,text,image,status) VALUES (:name,:mail,:text,:image,:status)';
        $result = $db->prepare($sqlquery);
        // $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':mail', $mail, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':image', $pic, PDO::PARAM_STR);
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