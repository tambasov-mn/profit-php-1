<?php
// 1. Включим файл БД-Массив картинок : ...............................................................................
// '/img/*.jpg'
// $db_images = require  __DIR__ . '/2-db-images.php';
$db_images = require_once __DIR__ . '/db/db-images.php';

// 2. Получим значение id картинки через GET : ........................................................................
$image_name = $db_images[$_GET['id']];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Примитивная фотогалерея</title>

    <style>
        .images-gallery-large a {
            text-decoration: none;
            color: mediumblue;
        }
        .images-gallery-large a:hover {
            text-decoration: none;
            text-shadow: 0px 0px 1px #000000; /* x y  */

        }
        .images-gallery-large img {
            box-shadow: 3px 3px 30px 3px #000000; /* x y  */
            border: 1px solid mediumblue;
            width: 960px; /* 960 / 480 */
        }
        .images-gallery-large img:hover {
            border: 1px solid mediumblue;
            box-shadow: 3px 3px 30px 3px #000000; /* x y  */

            width: 960px; /**/
        }
    </style>
</head>

<body>

    <table style="width: 100%; align-content: center;">
        <tr style="width: 100%">
            <td style="width: 50%; text-align: right;"><h1>примитивнаЯ</h1></td>
            <td style="width: 50%; text-align: left;"><h1>Котогалерея</h1></td>
        </tr>
    </table>


    <div class="images-gallery-large" style="text-align: center;">
        <div style="text-align: center;">
            <img src="/profit-php-1/DZ/06/2/images/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="960" >
            <br><br>
            <a href="/profit-php-1/DZ/06/2/index.php">>> <b>НАЗАД</b> <<</a>
        </div>
    </div>

</body>
</html>