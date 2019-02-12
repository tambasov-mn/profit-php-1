<?php
/* 6.*
 * $x = true xor true;
 * var_dump($x); // false
 * Попробуйте объяснить результат
 *
 */

$x = true xor true;
echo $x; // 1 (true)
var_dump($x); // bool(true)

/*
 * Ответ:
 * Логический оператор XOR - исключающее или. (TRUE, если $a, или $b TRUE, но не оба).
 * (http://php.net/manual/ru/language.operators.logical.php)
 *
 * Так как приоритет оператора XOR такой же как и у операторов AND и OR (ниже чем у оператора присваивания),
 * и он используется в выражении с присваиванием, то сначала он вычисляет и возвращает значение левого операнда.
 * Порядок выполнения операторов (http://php.net/manual/ru/language.operators.precedence.php)
 *
 * $x присвоится значение true
 */
?>


