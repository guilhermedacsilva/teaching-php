<?php
namespace Model;

class Message
{
    const DATAFILE = APP_ROOT . 'Database/data.txt';
    private $userName;
    private $userMessage;

    public function __construct($userName, $userMessage)
    {
        $this->userName = $userName;
        $this->userMessage = $userMessage;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getUserMessage()
    {
        return $this->userMessage;
    }

    public function save()
    {
        $dataArray = self::all();
        $dataArray[] = $this;
        $dataString = serialize($dataArray);
        file_put_contents(self::DATAFILE, $dataString);
    }

    public static function all()
    {
        $recordsString = file_get_contents(self::DATAFILE);
        $records = unserialize($recordsString);
        return $records;
    }

    public static function createDatafile()
    {
        if (!file_exists(self::DATAFILE)) {
            $initialStringData = serialize([]);
            file_put_contents(self::DATAFILE, $initialStringData);
        }
    }
}
