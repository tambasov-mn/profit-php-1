<?php
/**
 * ДОМАШНЯЯ РАБОТА №2. Задание 1.:
 *
 * Напишите программу, которая составит и выведет в браузер таблицу истинности
 * ( https://ru.wikipedia.org/wiki/%D0%A2%D0%B0%D0%B1%D0%BB%D0%B8%D1%86%D0%B0_%D0%B8%D1%81%D1%82%D0%B8%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D0%B8 )
 * для логических операторов &&, || и xor.
 */

/**
 * Функция, которая составит и выведет в браузер таблицу истинности для логических операторов &&, || и XOR
 * @param integer $table_name Название таблицы
 * 0 == && (AND)
 * 1 == || (OR)
 * 2 == XOR
 *   == null
 * @return string Таблица && | Таблица || | Таблица XOR | null
 */
function view_tables_truth ( $table_name ) {
    $x1 = false;
    $x2 = true;
    $z1 = false;
    $z2 = true;

    $x21 = null;
    $x22 = null;
    $x31 = null;
    $x32 = null;

    $table_title = null; // название таблицы
    $table_label = null; // лэйбл в углу таблицы

    // AND: ...........................................................................................................
    if ( 0 == $table_name ) {
        $table_title = 'Таблица истинности для логического оператора && (AND), – логическое "И":';
        $table_label = '&&';

        $x21 = (int) ($x1 && $z1);
        $x22 = (int) ($x2 && $z1);
        $x31 = (int) ($x1 && $z2);
        $x32 = (int) ($x2 && $z2);

    }
    // OR: ............................................................................................................
    elseif ( 1 == $table_name ) {
        $table_title = 'Таблица истинности для логического оператора || (OR), – логическое "ИЛИ":';
        $table_label = '||';

        $x21 = (int) ($x1 || $z1);
        $x22 = (int) ($x2 || $z1);
        $x31 = (int) ($x1 || $z2);
        $x32 = (int) ($x2 || $z2);

    }
    // XOR: ...........................................................................................................
    elseif ( 2 == $table_name ) {
        $table_title = 'Таблица истинности для логического оператора XOR, – логическое "ИСКЛЮЧАЮЩЕЕ ИЛИ":';
        $table_label = 'XOR';

        $x21 = (int) ($x1 XOR $z1);
        $x22 = (int) ($x2 XOR $z1);
        $x31 = (int) ($x1 XOR $z2);
        $x32 = (int) ($x2 XOR $z2);

    } else {
        return null;
    }

    // Выводим таблицу.
    return '<h2>' . $table_title . '</h2>
    <table border="1" width="240" height="240" style="text-align: center;">
        <tr width="240" height="80">
            <td width="100" ><b>' . $table_label . '</b></td>
            <td width="100">' . ( (int) $x1 ) . '</td>
            <td width="100">' . ( (int) $x2 ) . '</td>
        </tr>
        <tr width="240" height="80">
            <td width="100">' . ( (int) $z1 ) . '</td>
            <td width="100">' . $x21 . '</td>
            <td width="100">' . $x22 . '</td>
        </tr>
        <tr width="240" height="80">
            <td width="100">' . ( (int) $z2 ) . '</td>
            <td width="100">' . $x31 . '</td>
            <td width="100">' . $x32 . '</td>
        </tr>
    </table>';

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Таблицы истинности для логических операторов &&, || и XOR.</title>
</head>

<body>

    <h1>Таблицы истинности для логических операторов &&, || и XOR.</h1>

    <?php echo view_tables_truth( 0 ); ?>
    <?php echo view_tables_truth( 1 ); ?>
    <?php echo view_tables_truth( 2 ); ?>

</body>
</html>