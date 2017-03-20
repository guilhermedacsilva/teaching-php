<?php
define('DATAFILE', 'data.txt');

if (!file_exists(DATAFILE)) {
    $emptyArraySerialized = serialize([]);
    file_put_contents(DATAFILE, $emptyArraySerialized);
}

$needsToCreate = array_key_exists('userName', $_POST) && array_key_exists('userMessage', $_POST);
if ($needsToCreate) {
    $stringData = file_get_contents(DATAFILE);
    $arrayData = unserialize($stringData);
    $arrayData[] = [
        'userName' => $_POST['userName'],
        'userMessage' => $_POST['userMessage'],
    ];
    $stringData = serialize($arrayData);
    file_put_contents(DATAFILE, $stringData);
}

$stringData = file_get_contents(DATAFILE);
$arrayData = unserialize($stringData);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat Online</title>
    <style type="text/css">
        .bold { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Send your message</h1>
    <form method="post">
        User: <input name="userName">
        Message: <textarea name="userMessage"></textarea>
        <input type="submit" value="Send" name="submit">
    </form>
    <h1>Old messages</h1>
    <?php foreach ($arrayData as $message) : ?>
        <p>
            <span class="bold"><?= $message['userName'] ?></span>:
            <?= $message['userMessage'] ?>
        </p>
    <?php endforeach ?>
</body>
</html>
