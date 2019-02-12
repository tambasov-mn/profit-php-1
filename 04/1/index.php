<?php
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>

<body>
    <!-- 3. Сделайте страницу, где гостевая книга будет отображаться. Используйте функцию из пункта 2. -->
    <h1>ГОСТЕВАЯ КНИГА</h1>

    <h2>Комментарии:</h2>

    <p>
    <?php
    foreach (getGuestPosting() as $num => $post) {
        ?>
        <b>Запись <?php echo ++$num; ?>:</b> <?php echo $post; ?>
        <br><br>
        <?php
    }
    ?>
    </p>
    <!-- /3. Сделайте страницу, где гостевая книга будет отображаться. Используйте функцию из пункта 2. -->

    <!-- 4. В конце страницы сделайте форму для добавления новой записи в гостевую книгу. -->
    <h2>Оставьте свой комментарий:</h2>

    <form action="/profit-php-1/DZ/04/1/add_new_post.php" method="post">
        <textarea name="new_post" cols="50" rows="4" placeholder="Ваш комментарий"></textarea>
        <br>
        <button type="submit">Добавить запись</button>
    </form>
    <!-- /4. В конце страницы сделайте форму для добавления новой записи в гостевую книгу. -->

</body>
</html>