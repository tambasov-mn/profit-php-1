<?php
/**
 * БД-Массив названия картинок. 2.0 =)
 */

// Получим директорию для анализа: ....................................................................................
$path = dirname(__DIR__) . '/images';
// Тест:
//var_dump($path); // string(81) "C:\WEB_SERVER\www\MY_LABS\PHP\php-001.tambasov.mn\www\profit-php-1\DZ\04\2/images"

// Обработка данных: ..................................................................................................
// -остаим только файлы с расширением 'jpg'
// -результат присвоим $db_images

$db_images = null;
$i = 0; // можно использовать для нумерации индексов с 1.

foreach (scandir($path) as $file_name) {
    if( (is_file($path).'/'.$file_name) == true
        && $file_name != '.'
        && $file_name != '..'
        && (pathinfo(($path).'/'.$file_name )['extension']) == 'jpg' ) {
        $db_images[$i++] = $file_name;
    } else {
    }
}
// Тест:
//var_dump($db_images);
/*
array(4) {
  [1]=> string(18) "gallery-img-01.jpg"
  [2]=> string(18) "gallery-img-02.jpg"
  [3]=> string(18) "gallery-img-03.jpg"
  [4]=> string(18) "gallery-img-04.jpg"
}
*/

// Выведем результат через return, как ранее: .........................................................................
/*
return [
    1 => 'gallery-img-01.jpg',
    2 => 'gallery-img-02.jpg',
    3 => 'gallery-img-03.jpg',
    4 => 'gallery-img-04.jpg',
];
*/
return $db_images;