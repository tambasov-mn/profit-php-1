<?php
/**
 * БД-Массив названия картинок. 2.0 =)
 */

$path = dirname(__DIR__) . '/images';

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
return $db_images;