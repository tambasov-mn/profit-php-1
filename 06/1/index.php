<?php
require_once __DIR__ . '/classes/GuestBook.php';

$guestBook = new GuestBook(__DIR__ . '/db_guest_posting.txt');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>

<body>

    <h1>ГОСТЕВАЯ КНИГА</h1>

    <h2>Комментарии:</h2>

    <p>
    <?php
    foreach ($guestBook->getData() as $num => $post) {
    ?>
        <b>Запись <?php echo ++$num; ?>:</b> <?php echo $post; ?>
        <br><br>
    <?php
    }
    ?>
    </p>

    <h2>Оставьте свой комментарий:</h2>

    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']).'/'; ?>add_new_post.php" method="post">
        <textarea name="new_post" cols="50" rows="4" placeholder="Ваш комментарий"></textarea>
        <br>
        <button type="submit">Добавить запись</button>
    </form>

</body>
</html>