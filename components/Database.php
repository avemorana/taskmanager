<?php

class Database
{
    /*
     * connect to db, return db object
     */
    public static function getConnection()
    {
        $paramsPath = '/config/db_config.php';
        $params = include($paramsPath);
        $db = mysqli_connect($params['host'], $params['user'], $params['password'], $params['db_name'])
        or die(mysqli_error("die"));
        return $db;
    }
}