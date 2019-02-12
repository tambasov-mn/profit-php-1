<?php
//header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/index.php');


?>
Коолеги! Есть вопросик:
!!! ПОНИМАНЕ ЧЕМ ОТЛИЧАЮТСЯ ССЫЛКИ И ФАЙЛЫ ЕСТЬ !!!

Если Я пишу лабы в папке (относительно) корня сайта: /php1/lesson_01/
Попасть в лабу можно по URL: http://mysite.local/php1/lesson_01/

Далле кто-то закачивает лабу себе на сайт, в корень сайта": /
Попасть в лабу можно по URL: http://site.local/

Как ПРАВИЛЬНО НАПИСАТЬ АВТОМАТИЧЕСКИЙ ГЕНЕРАТОР path для ССЫЛОК
например для header('Location: ');

За такой пример
header('Location: ' . dirname($_SERVER['REQUEST_URI']) . '/index.php');
Альберт сказал поставит КОЛЛЛЛ =)

Использовать - $_SERVER['REQUEST_URI'] - должно быть нормально,
Но использовать функцию 'dirname()' - чтобы убрать файл - ПЛОХО!

Может есть какойто способ как это делать...?
Или использовать какойто аналог функци 'dirname()'...?
Или выносить путь руками в переменную..?





<?php
var_dump(dirname($_SERVER['SCRIPT_NAME']));
echo '<hr>';

$_SERVER["REQUEST_URI"];

var_dump($_SERVER);

// *****************************
//dirname($_SERVER['SCRIPT_NAME'])

// v2
//["REQUEST_URI"]
echo '<hr>' . dirname($_SERVER['REQUEST_URI']);

// Коллеги есть вопросик