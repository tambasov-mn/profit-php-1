<?php
// Подключим функции: .................................................................................................

require_once __DIR__ . '/f_get_users_list.php'; // getUsersList() - типо БД-массив пользователей: [логин] => [хэш пароля]
require_once __DIR__ . '/f_exists_user.php'; // existsUser($login) - проверка существования Пользователя.
require_once __DIR__ . '/f_сheck_password.php'; // сheckPassword($login, $password)
require_once __DIR__ . '/f_get_current_user.php'; // getCurrentUser()

// ....................................................................................................................
//setcookie('first_start', 1); // маркер попытки логина:

// ....................................................................................................................
session_start();

if (!($_POST['login']) ) {
    $login = null;
} else {
    $login = $_POST['login'];
}

$msg_status               = null; // сообщение об ошибке

// Проверка данных формы ..............................................................................................

// 1. ЕСЛИ пользователь уже вошел (см. пункт 2), ТО редирект на главную страницу.
// 3. ЕСЛИ введены данные в форму входа - проверяем им (см. пункт 1.3) и ЕСЛИ проверка прошла,
if  ( null != getCurrentUser() &&  true != сheckPassword($login, $password) ) {
    $_SESSION['check_status'] = true;
    if (!$_SESSION['username']) {
        $_SESSION['username'] = $login; // имя пользователя - после авторизации.
    } else {
    }
    $msg_status               = null;
    $block_error_view         = 'none';

    header('Location: /profit-php-1/DZ/05/1/index.php');

// 2. ЕСЛИ пользователь не вошел - отображает форму входа.
} elseif  ( true != сheckPassword($login, $password) && null == getCurrentUser()) {
    $_SESSION['check_status'] = null;
    $_SESSION['username']     = null;

    $msg_status               = 'Введите логин и пароль.';
    $block_error_view         = 'none';

    header('Location: /profit-php-1/DZ/05/1/login.php');

// ИНАЧЕ - отображает форму входа.
} else {
    $_SESSION['check_status'] = null;
    $_SESSION['username']     = null;

    $msg_status               = 'Введите правильный логин и пароль.';
    $block_error_view         = 'block';
}

// TEST ...............................................................................................................
//var_dump(getCurrentUser()) ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Страница логин</title>
</head>

<body>
    <h1 style="text-align: center;">СТРАНИЦА ЛОГИН</h1>

    <!-- Форма входа -->
    <hr>
    <h2 style="text-align: center;">Залогиньтесь:</h2>

    <div style="text-align: center; border: 1px;">
        <form action="/profit-php-1/DZ/05/1/login.php" method="post">
            <input type="text" name="login" placeholder="Введите свой логин" value="<?php echo $login ; ?>">
            <input type="password" name="password" placeholder="Введите свой пароль" value="">

            <br><br>
            <button type="submit">Войти</button>
        </form>
    </div>
    <!-- /Форма входа -->

    <!-- Блок. Статус проверки логин/пароль -->
    <div style="text-align: center; border: 1px; display: <?php echo $block_error_view; ?>">
        <p style="text-align: center;"><b>ошибка:</b> <span style="text-align: center; color: red;"><?php echo $msg_status; ?></span></p>
    </div>

    <br>
    <hr>
    <!-- /Блок. Статус проверки логин/пароль -->

</body>
</html>