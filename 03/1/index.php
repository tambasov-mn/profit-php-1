<?php
/**
 * ДОМАШНЯЯ РАБОТА №3. Задание 1.:
 *
 * Напишите программу-калькулятор:
 *
 * 1. Форма для ввода двух чисел, выбора знака операции и кнопка "равно"
 *
 * 2. Данные пусть передаются методом GET из формы (да, можно и так!) на скрипт,
 *    который их примет и выведет выражение и его результат
 *
 * 3.*Попробуйте улучшить программу. Пусть данные отправляются на ту же страницу на PHP, введенные числа останутся
 *    в input-ах, а результат появится после кнопки "равно"
 *
 */

// Добавим файл с функцикией калькулятора .............................................................................
require_once __DIR__ . '/calculator/function_calculator.php';

// Массив со знаками операций: ........................................................................................
$arithmetic_signs = [
    1 => '+',
    2 => '-',
    3 => '*',
    4 => '/',
];

// Обработка входящих данных: .........................................................................................

// Проверяем значение $_GET['number_1'],
// если значение есть - приведем его к integer и присвоим его $number_1, иначе $number_1 == null:
if (isset($_GET['number_1'])) {
    $number_1 = (int) $_GET['number_1'];
} else {
    $number_1 = null;
}

// Проверяем значение $_GET['number_2'],
// если значение есть - приведем его к integer и присвоим его $number_2, иначе $number_2 == null:
if (isset($_GET['number_2'])) {
    $number_2 = (int) $_GET['number_2'];
} else {
    $number_2 = null;
}

// Проверяем значение $_GET['arithmetic_signs'],
// если значение есть и оно соответствует отдному из значений в массиве операций $arithmetic_signs
// - присвоим его $arithmetic_sign, иначе $arithmetic_sign == null:
if (isset($_GET['arithmetic_signs']) && in_array($_GET['arithmetic_signs'], $arithmetic_signs)) {
    $arithmetic_sign = $_GET['arithmetic_signs'];
} else {
    $arithmetic_sign = null;
}

// Подставляем значения в функцию и получаем результат ................................................................

$result = calculate ($number_1, $number_2, $arithmetic_sign);
//var_dump($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Программа-калькулятор</title>
</head>

<body>

    <h1>Программа-калькулятор:</h1>

    <form action="/profit-php-1/DZ/03/1/index.php" method="get">
        <input type="number" name="number_1" placeholder="Введите первое число" value="<?php echo $number_1; ?>">

        <select name="arithmetic_signs">
            <?php
            foreach ($arithmetic_signs as $signs) {
                ?>
                <option value="<?php echo $signs; ?>" <?php if ($arithmetic_sign == $signs) { ?>selected<?php } ?>><?php echo $signs; ?></option>
                <?php
            }
            ?>
        </select>

        <input type="number" name="number_2" placeholder="Введите второе число" value="<?php echo $number_2; ?>">

        <button type="submit">=</button> &nbsp;

        <?php echo $result; ?>
    </form>

</body>
</html>