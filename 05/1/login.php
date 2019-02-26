<?php
session_start();

require_once __DIR__ . '/functions.php';

// 2. ЕСЛИ пользователь не вошел - отображает форму входа.
if( !isset($_SESSION['username']) ) {
    // 3. ЕСЛИ введены данные в форму входа - проверяем (см. пункт 1.3) и ЕСЛИ проверка прошла,
    // ТО запоминаем информацию о вошедшем пользователе.
    if ( true === isset($_POST['login']) && true === isset($_POST['password']) ) {
        if(checkPassword($_POST['login'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['login'];
            // 1. ЕСЛИ пользователь уже вошел (см. пункт 2), ТО редирект на главную страницу.
            header('Location: /profit-php-1/DZ/05/1/index.php');

        } else {
            $login = $_POST['login'];
            $block_error_view = 'block';
            $msg_color  = 'red';
            $msg_status= 'Вы ввели неверное имя пользователя или неверный пароль';
        }
    } else {
        $login = '';
        $block_error_view = 'none';
    }
// 1. ЕСЛИ пользователь уже вошел (см. пункт 2), ТО редирект на главную страницу.
} else {
    header('Location: /profit-php-1/DZ/05/1/index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Страница логин</title>

</head>

<body>
    <h1 style="text-align: center;">СТРАНИЦА ЛОГИН</h1>

    <!-- Форма входа -->
    <hr>
    <h2 style="text-align: center;">Введите ваше имя и пароль для входа в систему:</h2>

    <div style="text-align: center; border: 1px;">
        <form action="/profit-php-1/DZ/05/1/login.php" method="post">
            <input type="text" name="login" placeholder="Введите свой логин" value="<?php echo $login; ?>">
            <input type="password" name="password" placeholder="Введите свой пароль" value="">

            <br><br>
            <button type="submit">Войти</button>
        </form>
    </div>
    <!-- /Форма входа -->

    <!-- Блок. Статус проверки логин/пароль -->
    <div style="text-align: center; border: 1px; display: <?php echo $block_error_view; ?>">
        <p style="text-align: center;"><span style="text-align: center; color: <?php echo $msg_color; ?>;"><?php echo $msg_status; ?></span></p>
    </div>

    <br>
    <hr>
    <!-- /Блок. Статус проверки логин/пароль -->

</body>
</html>