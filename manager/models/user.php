<?php


class user
{
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function register($name, $pass)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, password) VALUES (:name, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $pass, PDO::PARAM_STR);

        $pass = password_hash($pass, PASSWORD_DEFAULT);

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

        $sql = 'SELECT * FROM user WHERE name = :name';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        $hash_pass = $user['password'];

        if(password_verify($pass, $hash_pass))
        {
            return $user['user_id'];
        }else return false;
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }

        header('Location: /login');
    }

    public static function isGuest()
    {
        if(isset($_SESSION['user']))
        {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if($id)
        {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE user_id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

}