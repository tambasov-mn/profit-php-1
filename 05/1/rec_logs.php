<?php
// Подключим функцию для работы с гостевой книгой:
require_once __DIR__ . '/functions.php';

// "Сохраним" все записи гостевой книги в массив $posts:
$posts   = getGuestPosting();

// Добавим в конец массива $posts - запись из формы ($_POST['comment']):
$posts[] = $_POST['new_post'];

// Запишим все записи гостевой из массива $posts в файл '/db_guest_posting.txt' (Одна строка - одна запись).
file_put_contents(__DIR__ . '/db_guest_posting.txt', implode("\n", $posts) );

// Вернемся на главную страницу, через заголовок 'Location: ':
header('Location: /profit-php-1/DZ/05/1/index.php');
