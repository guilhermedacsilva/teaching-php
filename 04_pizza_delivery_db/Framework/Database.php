<?php
namespace Framework;

use \PDO;

class Database
{
    /*
    Sample: mysql:host=localhost;port=3306;dbname=meudatabase
    */
    const DNS_FORMAT = '%s:host=%s;port=%s;dbname=%s';
    private static $pdo;

    public static function query($sql)
    {
        return self::getPdo()->query($sql);
    }

    public static function exec($sql)
    {
        return self::getPdo()->exec($sql);
    }

    public static function prepare($sql)
    {
        return self::getPdo()->prepare($sql);
    }

    public static function getPdo()
    {
        if (self::$pdo == null) {
            self::createPdo();
        }
        return self::$pdo;
    }

    private static function createPdo()
    {
        require APPLICATION_CONFIG . 'db.php';
        self::$pdo = new PDO(
            self::getDnsString($dbArray),
            $dbArray['user'],
            $dbArray['password'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
        );
    }

    private static function getDnsString($dbArray)
    {
        return sprintf(
            self::DNS_FORMAT,
            $dbArray['driver'],
            $dbArray['host'],
            $dbArray['port'],
            $dbArray['database']
        );
    }
}
