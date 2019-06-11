<?php


class user
{
    public static function register($name, $pass)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, password) VALUES (:name, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $pass, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
      if(strlen($name)>=2)
      {
          return true;
      }
      return false;
    }

    public static function checkPass($pass)
    {
        if(strlen($pass)>=2)
        {
            return true;
        }
        return false;

    }

    public static function checkNameExists($name)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE name = :name';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
        {
            return true;
        }
        return false;

    }

    public static function checkUserData($name, $pass)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE name = :name AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_INT);
        $result->bindParam(':password', $pass, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if($user)
        {
            return $user['user_id'];
        }

        return false;
    }

    public static function auth($userId)
    {
      session_start();
      $_SESSION['user'] = $userId;
    }


}