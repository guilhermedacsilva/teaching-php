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
    <h1>Messages</h1>
    <?php foreach ($messages as $message) : ?>
        <p>
            <span class="bold"><?= $message->getUserName() ?></span>:
            <?= $message->getUserMessage() ?>
        </p>
    <?php endforeach ?>
</body>
</html>
