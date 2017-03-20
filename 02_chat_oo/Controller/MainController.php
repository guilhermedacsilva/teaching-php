<?php
namespace Controller;

use \Model\Message;

class MainController
{
    public function index()
    {
        $messages = Message::all();
        require APP_ROOT . 'View/index.php';
    }

    public function create()
    {
        $userName = $_POST['userName'];
        $userMessage = $_POST['userMessage'];
        $message = new Message($userName, $userMessage);
        $message->save();
        header("Location: .");
        exit;
    }
}
