<?php
/**
 * Функция для программы "калькулятор"
 * @param integer $x1, integer $x2, string $sign Входящие параметры: $x1 - число 1, $x2 - число 2, $sign - знак операции.
 * @return integer | null Вернется: результат | null.
 */
function calculate ($x1, $x2, $sign) {
    if (isset($sign)) {
        switch ($sign) {
            case '+':
                return $result = $x1 + $x2;
                break;

            case '-':
                return $result = $x1 - $x2;
                break;

            case '*':
                return $result = $x1 * $x2;
                break;

            case '/':
                if (0 == $x2) {
                    return $result = null; // На ноль делить нельзя
                } else {
                    return $result = $x1 / $x2;
                }
                break;

            default:
                return $result = null;
                break;
        }
    } else {
        return $result = null;
    }
}

// Тесты:
assert( 6 === calculate(4, 2, '+'));
assert( 2 === calculate(4, 2, '-'));
assert( 8 === calculate(4, 2, '*'));
assert( 2 === calculate(4, 2, '/'));
assert( null == calculate(4, 2, '&&'));

//echo calculate (1, 2, '*');