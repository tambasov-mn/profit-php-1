<?php
// Тесты:
// var_dump( $_SESSION['test'] ) ;

/**
 * Функция getUsersList() - возвращает массив всех пользователей и хэшей их паролей
 * @param
 * @return array ассоциативный массив "БД пользователей" : "пользователь" => "хеш пароля"
 */
function getUsersList() {
    return [
        'admin' => '$2y$10$5Feq8lKpKhVSlogCyrt/2uSyB4bX9CcUfim09XoYjk7uheB61W8wS', // 'P@$$w0rd42!?'
        'user'  => '$2y$10$Ms6YUxa0EBOIZFRiFnv.cecwZ5wIbh0qW6v4fMswjPrjjU4LuzVyK', // 'MySecretWord'
        'guest' => '$2y$10$qnorP6MxGC/9re2vPk2Fp.BThyScqbUcvKc.i8l5AZyS0OgMuglXO', // '123456'
    ];
}
// Тесты:
assert(true === is_array(getUsersList()) );

/**
 * Функция existsUser($login) - проверяет - существует ли пользователь с заданным логином
 * @param string $login логин пользователя
 * @return bool true | null если пользователь есть - вернется true, в остальных случаях вернется null
 */
function existsUser($login) {
    if ( isset(getUsersList()[$login] ) ) {
        return true;
    } else {
        return null;
    }
}
// Тесты:
assert( null  === existsUser('barsik') );
assert( true  === existsUser('user') );

/**
 * Функция checkPassword($login, $password) - возвращает true тогда, когда существует пользователь с указанным логином
 * и введенный им пароль прошел проверку
 * @param string $login логин пользователя
 * @param string $password пароль пользователя
 * @return bool true | null возвращает true тогда, когда существует пользователь с указанным логином и введенный им
 * пароль прошел проверку, в остальных случаях вернется null
 */
function checkPassword($login, $password) {
    if ( ( true === existsUser($login) ) && ( true === password_verify($password, getUsersList()[$login]) ) ) {
        return true;
    } else {
        return null;
    }
}
// Тесты:
assert( null === checkPassword('noname', '123456') );
assert( null === checkPassword('guest', '123') );
assert( true === checkPassword('guest', '123456') );

/**
 * Функция getCurrentUser() - возвращает либо имя вошедшего на сайт пользователя, либо null
 * @param
 * @return string|null возвращает либо имя вошедшего на сайт пользователя, либо null
 */
function getCurrentUser() {
    if ( isset($_SESSION['username']) ) {
        return $_SESSION['username'];

    } else {
        return null;
    }
}
// Тесты:
/*
$_SESSION['check_status'] = null;
$_SESSION['username'] = 'guest';
assert( null == getCurrentUser() );
*/
/*
$_SESSION['check_status'] = '123456';
$_SESSION['username'] = 'guest';
assert( 'guest' == getCurrentUser() );
*/

/**
 * Функция addRecordToLogsUploads($username, $upload_file_name) - записывает в лог файл загрузок данные: имя пользователя,
 * дату и время (в формате MySQL DATETIME), а также имя загружаемого файла
 * @param string $username имя залогиненого пользователя
 * @param string $upload_file_name имя загруженного файла
 * @return bool true | null если новая запись добавлена в лог то вернется bool true, в остальных случаях вернется null
 */
function addRecordToLogsUploads($username, $upload_file_name) {
    if ( true === existsUser($username) && true === isset($upload_file_name) ) {
        // Сгенерируем новую строку лога
        $string_for_log = $username . ' ~~ ';
        $string_for_log .= date("Y-m-d H:i:s") . ' ~~ ';
        $string_for_log .= $upload_file_name . PHP_EOL;

        // "Сохраним" все записи гостевой книги в массив $posts:
        $logs_uploads = file(__DIR__ . '/logs/upload.log', FILE_IGNORE_NEW_LINES);

        // Добавим новую запись в конец лога
        $logs_uploads[] = $string_for_log;

        // Запишим все записи лога в файл '/logs/upload.log' (Одна строка - одна запись).
        file_put_contents(__DIR__ . '/logs/upload.log', implode(PHP_EOL, $logs_uploads));
        return true;
    } else {
        return null;
    }
}
// Тест:
assert( null === addRecordToLogsUploads('barsik', null ) );
assert( null === addRecordToLogsUploads('guest', null ) );
//assert( true === addRecordToLogsUploads('guest', 'test.jpg') );
