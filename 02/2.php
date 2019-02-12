<?php
/**
 * ДОМАШНЯЯ РАБОТА №2. Задание 2.:
 *
 * Составьте функцию вычисления дискриминанта квадратного уравнения. Покройте ее тестами.
 * Используя эту функцию, напишите программу, которая решает квадратное уравнение.
 * Оформите красивый вывод решения.
 */

/**
 * Функция для вычисления дискриминанта
 * @param integer $b, $a, $c Это $b, $a, $c
 * @return integer Дискриминант
 */
function discriminant($b, $a, $c) {

    return $b ** 2 - 4 * $a * $c;
}
// Тесты:
// var_dump(discriminant(2, 4, 16));
//var_dump(discriminant(2, 1, 1));
assert( 224 == discriminant(16, 2, 4) ); // int(224) == int(224)
assert( 0 == discriminant(2, 1, 1) ); // 0 == 0
assert( 0 < discriminant(16, 2, 4) ); // 0 < int(224)
assert( 0 > discriminant(2, 4, 16) ); // 0 > int(-252)


// .........................................................

// Используя эту функцию, напишите программу, которая решает квадратное уравнение.
// Квадратное уравнение — уравнение вида ax**2 + bx + c = 0, где a, b, c — некоторые числа (a ≠ 0), x — неизвестное.

// 1. Сделаем функцию для проверки входных данных в соответствии (a, b, c — некоторые числа (a ≠ 0)):
// (иначе выведем ошибку (детально проверять не будем, просто если ошибка выведем null))
/**
 * Функция для проверки значений a,b,c
 * @param integer $a, $b, $c Значения: $a, $b, $c
 * @return boolean true | string  Результат проверки true или текст описание ошибки
 */
function check_abc ($a1, $b1, $c1) {
    //
    $check_status_a = null;
    $check_status_b = null;
    $check_status_c = null;

    // проверим а:
    if (isset($a1) && ($a1 != 0) && ('integer' === gettype($a1))) {
        $check_status_a = null;
    } elseif ($a1 === 0) {
        $check_status_a = 'a введено не корректно: a - не должно ровняться 0.';
    } else {
        $check_status_a = 'a введено не корректно: a - должно быть число.';
    }
    // проверим b:
    if(isset($b1) && ('integer' == gettype($b1))) {
        $check_status_b = null;
    } else {
        $check_status_b = 'b введено не корректно: b - должно быть число.';
    }
    // проверим c:
    if(isset($c1) && ('integer' == gettype($c1))) {
        $check_status_c = null;
    } else {
        $check_status_c = 'c введено не корректно: c - должно быть число.';
    }

    // Результат проверки:
    if ((null == $check_status_a) && (null == $check_status_a) && (null == $check_status_a)) {
        return true;
    } else {
        return $check_status_a . $check_status_b . $check_status_c;
    }
}

// ТЕСТЫ check_abc():
assert ( true == check_abc(1, 1, 1) );
assert ( 'a введено не корректно: a - не должно ровняться 0.b введено не корректно: b - должно быть число.c введено не корректно: c - должно быть число.'
    == check_abc(0, xsxsx, 'txt') );
assert ( 'a введено не корректно: a - не должно ровняться 0.c введено не корректно: c - должно быть число.' == check_abc(0, 7, 'txt') );
assert ( 'a введено не корректно: a - должно быть число.' == check_abc('txt', 7, 7) );


// 2. Создадим блок "Дано" ............................................................................................

// Тут адаем значения (a, b, c):

$a = 4;
$b = 44;
$c = 1;

// В зависимости от результатов проверки входящих значений выводим блок Расчетов | Ошибка .............................

$check_res = check_abc (($a), ($b), ($c));

$block_error_view_status  = null;
$block_result_view_status = null;

if ($check_res == 1) {
    // Вевести блок Расчетов:
    $block_error_view_status  = 'none;';
    $block_result_view_status = 'block;';

} else {
    // Вевести блок Ошибка:
    $block_error_view_status  = 'block;';
    $block_result_view_status = 'none;';
}

// Рассчитаем D, используя нашу функцию: .............................................................................
$D = discriminant($b, $a, $c);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Программа которая решает квадратные уравнения</title>

    <style>
        /* discriminant */
        .downline {
            border-bottom: 1px solid #000;
        }
        .upline {
            border-top: 1px solid black;
        }
        .downnumber {
        td {
            text-align: center;
        }
    </style>

</head>

<body>
    <h1>Программа которая решает квадратные уравнения.</h1>

    <h2>ЗАДАНИЕ:</h2>

    <p>
        Составьте функцию вычисления дискриминанта квадратного уравнения.<br>
        Покройте ее тестами.<br>
        Используя эту функцию, напишите программу, которая решает квадратное уравнение.<br>
        Оформите красивый вывод решения.<br>
    </p>

    <!-- Вывод решения программы, которая решает квадратное уравнение ============================================== -->
    <div style="display: <?php echo $block_error_view_status; ?>">
        <h2>ОШИБКА:</h2>

        <p style="color: red;"><?php echo $check_res; ?></p>
    </div>

    <div style="display: <?php echo $block_result_view_status; ?>">

        <!-- 1. Вывод функции вычисления дискриминанта для квадратного уравнения ................................... -->

        <h2>РЕШЕНИЕ:</h2>

        <h3>1. Составьте функцию вычисления дискриминанта квадратного уравнения.</h3>

        <p>Формула дискриминанта: <b>D = b<sup>2</sup> &minus; 4ac</b></p>

        <p><b>Пример:</b></p>

        <p>
            <b><i>a</i></b> = <?php echo $a; ?>,&nbsp;
            <b><i>b</i></b> = <?php echo $b; ?>,&nbsp;
            <b><i>c</i></b> = <?php echo $c; ?>;
            <br>
            <b><i>D</i></b> = <?php echo $b; ?><sup>2</sup> &minus; 4 &times; <?php echo $a; ?> &times; <?php echo $c; ?> = <?php echo $D; ?>
        </p>

        <!-- 2. Вывод решения программы, которая решает квадратное уравнение ....................................... -->

        <h3>2. Используя эту функцию, напишите программу, которая решает квадратное уравнение. Оформите красивый вывод решения.</h3>

        <p>Программа: Решение квадратных уравнений:</p>

        <p>
            Квадратное уравнение - это уравнение вида: <b>ax<sup>2</sup> + bx + c = 0</b>,<br>
            где коэффициенты <b>a</b>, <b>b</b> и <b>c</b> - произвольные числа, причем: <b>a ≠ 0</b>.
        </p>

        <!-- Блок - Дано ........................................................................................... -->

        <h3>РЕШЕНИЕ:</h3>

        <p><b>1. ДАНО:</b></p>

        <p>
            <b>квадратное уравнение:</b><br>
            <?php echo $a; ?><b>x<sup>2</sup></b> + <?php echo $b; ?><b>x</b> + <?php echo $c; ?> = 0
        </p>

        <p>
            <b>коэффициенты:</b><br>
            <b>a</b> = <?php echo $a; ?>&nbsp;(причем: <b>a</b> ≠ 0)<br>
            <b>b</b> = <?php echo $b; ?><br>
            <b>c</b> = <?php echo $c; ?><br>
        </p>

        <p><b>2. Расчет дискрименента:</b></p>

        <p>
            <b>a</b> = <?php echo $a; ?>,&nbsp;
            <b>b</b> = <?php echo $b; ?>,&nbsp;
            <b>c</b> = <?php echo $c; ?>;
            <br>
            <b>D</b> = <?php echo $b; ?><sup>2</sup> &minus; 4 &times; <?php echo $a; ?> &times; <?php echo $c; ?>
            = <?php echo $b ** 2; ?> &minus; <?php echo 4*$a*$c; ?>
            = <?php echo $D; ?>.
        </p>

        <!-- Блок - Расчет корней .................................................................................. -->
        <p>
        <?php
            $quadraticEquationType = null;

            //var_dump($D1);
            $x1 = null;
            $x2 = null;

            switch (true) {
                // Если D < 0, корней нет;
                case $D < 0:
                    $quadraticEquationType = 'D < 0, корней нет'; ?>
                    В нашем случае: <b><?php echo $quadraticEquationType; ?></b>.
                    <?php
                    $x1 = null;
                    $x2 = null;
                    break;

                // Если D == 0, есть ровно один корень:
                case (0 == $D):
                    $quadraticEquationType = 'D = 0, есть ровно один корень'; ?>
                    В нашем случае: <b><?php echo $quadraticEquationType; ?></b>.
                    <?php
                    $x1 = ( (-$b) + sqrt($D) ) / (2 * $a);
                    ?>

                    <br><br>
                    <b>3. Найдем x:</b>

                    <table>
                        <tr>
                            <td rowspan="2"><b>x</b> = </td>

                            <td class="downline">
                                &minus;b &plus; &#8730;<span class="upline">D</span>
                            </td>

                            <td rowspan="2"> = </td>

                            <td class="downline">
                                &minus;<?php echo $b; ?> &plus; &#8730;<span class="upline"><?php echo $D; ?></span>
                            </td>

                            <td rowspan="2"> = <?php echo $x; ?> </td>
                        </tr>

                        <tr class="downnumber" style="text-align: center">
                            <td>2a</td>

                            <td>2 &times; <?php echo $a; ?></td>
                        </tr>
                    </table>
                    <?php
                    break;

                // 3.Если D > 0, корней будет два:
                case $D > 0:
                    $quadraticEquationType = 'D > 0, корней будет два'; ?>

                    В нашем случае: <b><?php echo $quadraticEquationType; ?></b>.

                    <?php
                    $x1 = ( (-$b) + sqrt($D) ) / (2 * $a);
                    $x2 = ( (-$b) - sqrt($D) ) / (2 * $a);
                    ?>

                    <br><br>
                    <b>3. Найдем x<sub>1</sub> и x<sub>2</sub>:</b>

                    <table>
                        <tr>
                            <td rowspan="2"><b>x<sub>1</sub></b> = </td>

                            <td class="downline">
                                &minus;b &plus; &#8730;<span class="upline">D</span>
                            </td>

                            <td rowspan="2"> = </td>

                            <td class="downline">
                                &minus;<?php echo $b; ?> &plus; &#8730;<span class="upline"><?php echo $D; ?></span>
                            </td>

                            <td rowspan="2"> = <?php echo $x; ?> </td>
                        </tr>

                        <tr class="downnumber" style="text-align: center">
                            <td>2a</td>
                            <td>2 &times; <?php echo $a; ?></td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <td rowspan="2"><b>x<sub>2</sub></b> = </td>

                            <td class="downline">
                                &minus;b &minus; &#8730;<span class="upline">D</span>
                            </td>

                            <td rowspan="2"> = </td>

                            <td class="downline">
                                &minus;<?php echo $b; ?> &minus; &#8730;<span class="upline"><?php echo $D; ?></span>
                            </td>

                            <td rowspan="2"> = <?php echo $x2; ?> </td>

                        </tr>

                        <tr class="downnumber" style="text-align: center">
                            <td>2a</td>
                            <td>2 &times; <?php echo $a; ?></td>
                        </tr>
                    </table>
                    <?php
                    break;

                default:
                    $quadraticEquationType = null;
                    $x1 = null;
                    $x2 = null;
                    break;
            }

            ?>

        </p>

        <!-- Блок - Ответ .......................................................................................... -->
        <p>
            <b>Ответ:</b>
            <?php
            switch (true) {
                case $D < 0:?>
                    Нет ни одного корня.
                    <?php
                    break;

                case $D == 0:?>
                    <b>x</b> = <?php echo round($x1, 2); ?>.
                    <?php
                    break;

                case $D > 0:?>
                    <b>x<sub>1</sub></b> = <?php echo round($x1, 2); ?>;
                    <b>x<sub>2</sub></b> = <?php echo round($x2, 2); ?>.
                    <?php
                    break;

                default:
                    break;
            }
            ?>
        </p>

    </div>
</body>
</html>