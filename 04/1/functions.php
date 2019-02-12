<?php
/**
 * Функция читает файл гостевой книги и возвращать массив записей гостевой книги (одна запись, одно значение)
 * @param
 * @return array Массив записей гостевой книги (одна запись, одно значение)
 */
function getGuestPosting() {
    return file(__DIR__ . '/db_guest_posting.txt', FILE_IGNORE_NEW_LINES);
}
// Тест:
// var_dump(getGuestPosting()); // array(3) { [0]=> string(65) "Первый коментарий в гостевой книги!" [1]=> string(40) "А Я второй коментарий." [2]=> string(40) "А Я третий коментарий." }