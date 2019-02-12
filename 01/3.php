<?php
// Попробуйте написать что-нибудь вроде var_dump(2*2); чтобы увидеть, как она работает.
var_dump(2 * 2);
// var_dump() - выводит значением выражения и его тип.
// Пр.: Выражение (2 * 2), получим значение выражени 4, а также его тип int(4) - целое число 4.
echo '<br>';


// Изучите с помощью этой функции следующие выражения:
//    1. 3 / 1
//    2. 1 / 3
//    3. '20cats' + 40
//    4. 18 % 4 (прочтите главу http://fi2.php.net/manual/ru/language.operators.arithmetic.php чтобы узнать, что это такое)
var_dump(3 / 1); // int(3) - целое число 3
echo '<br>';

var_dump(1 / 3); // float(0.33333333333333) - число с плавающей точкой, так как деление получилось с остатком
echo '<br>';

var_dump('20cats' + 40); // int(60) - целое число. (строковое значение (string) '20cats' преобразовалось в целое (integer) 20), далее int(20) + int(40) == int(60)
// из-за присутствия арифметического оператора происходит преобразование типов в int.
// так как строковое значение '20cats' начиналось с цифры эти цифры получим после преобразования, остальное отбросится (слово 'cats' отбросилось)), осталось int(20),
// если строковое значение начиналось не с цифр, то при преобразовании - был бы 0, пр. 'c2ats0' == 0
echo '<br>';

var_dump(18 % 4); // int(2) - целое число. (остаток от деления 18 - 16, получился остаток 2)
// (http://fi2.php.net/manual/ru/language.operators.arithmetic.php)
// $a % $b - это деление по модулю результатом которого будет целочисленный остаток от деления $a на $b.
echo '<br>';


?>