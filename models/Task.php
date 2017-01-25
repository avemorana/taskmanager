<?php
require_once ROOT . '/components/Database.php';

class Task
{
    public static function sendTaskToDb($task_name, $user_name, $task_descr, $email, $img_name)
    {
        $db = Database::getConnection();
        $db->query("SET NAMES 'utf8'");

        $result = $db->query("INSERT INTO `tasks` (`task_name`,`user`, `task`, `email`, `img_name`) 
                  VALUES ('$task_name', '$user_name', '$task_descr', '$email', '$img_name')");
        $db->close();
        return $result;
    }

    public static function getAllTasks()
    {
        $db = Database::getConnection();
        $db->query("SET NAMES 'utf8'");

        $result = $db->query("SELECT * FROM `tasks` ORDER BY `tasks`.`id` DESC");
        $db->close();
        return $result;
    }

    public static function getTaskById($id)
    {
        $db = Database::getConnection();
        $db->query("SET NAMES 'utf8'");

        $result = $db->query("SELECT * FROM `tasks` WHERE `id` = $id");
        $db->close();
        return $result;
    }

    public static function updateTask($id, $task_descr, $done)
    {
        $db = Database::getConnection();
        $db->query("SET NAMES 'utf8'");
        $result = $db->query("UPDATE `tasks` SET `task` = '$task_descr', `done` = $done WHERE  `id` = $id");
        $db->close();
        return $result;
    }

    public static function resize($img)
    {
        $max_width = 320;
        $max_height = 240;

        if ($img['type'] == 'image/jpeg')
            $source = imagecreatefromjpeg($img['tmp_name']);
        elseif ($img['type'] == 'image/png')
            $source = imagecreatefrompng($img['tmp_name']);
        elseif ($img['type'] == 'image/gif')
            $source = imagecreatefromgif($img['tmp_name']);
        else
            return false;

        $imgWidth = imagesx($source);
        $imgHeight = imagesy($source);

        if ($imgWidth > $max_width or $imgHeight > $max_height) {
            $ratio = $max_width / $imgWidth;
            $targetWidth = round($imgWidth / $ratio);
            $targetHeight = round($imgHeight / $ratio);

            $targetImg = imagecreatetruecolor($targetWidth, $targetHeight);
            imagecopyresampled($targetImg, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $imgWidth, $imgHeight);
            imagejpeg($targetImg, $img['tmp_name'] . $img['name']);
            imagedestroy($targetImg);
            imagedestroy($source);

        } else {
            imagejpeg($source, $img['tmp_name'] . $img['name']);
            imagedestroy($source);
        }

        return $img;
    }
}