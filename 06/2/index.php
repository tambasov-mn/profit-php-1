<?php
/**
 * ДОМАШНЯЯ РАБОТА №4.:
 */
// 1. Включим файл БД-Массив картинок : ...............................................................................
// '/img/*.jpg' - папка с картинками:
$db_images = include __DIR__ . '/db/db-images.php';

// 2. Получим значение id картинки через GET : ........................................................................
//$image_name = $db_images[$_GET['id']];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Примитивная фотогалерея</title>

    <style>
        .images-gallery a {
            text-decoration: none;
        }
        .images-gallery img {
            margin: 5px 5px 5px 5px;
            border: 1px solid mediumblue;
            box-shadow: 0px 0px 5px 1px #000000;
            width: 480px; /* 960 / 480 */ /* box-shadow: 3px 3px 30px 3px #000000; */
            z-index: 5;
        }
        .images-gallery img:hover {
            border: 2px solid cyan;
            box-shadow: 0px 0px 30px 5px #000000; /* x y  */
            width: 490px; /* 560px */
            z-index: 10;
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

    <!-- 2.2. Загрузка файлов от пользователя -->
    <hr>
    <h2 style="text-align: center;">загрузить файл с котиком в галлерею</h2>

    <div style="text-align: center;">
        <form action="/profit-php-1/DZ/06/2/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file_image">
            <br><br>
            <button type="submit">Загрузить</button>
        </form>
    </div>
    <br>
    <hr>
    <!-- /2.2. Загрузка файлов от пользователя -->

    <br><br>
    <div style="text-align: center;">
        <div class="images-gallery">

            <?php foreach ($db_images as $key => $image) { ?>

                <a href="/profit-php-1/DZ/06/2/image.php?id=<?php echo $key; ?>">
                    <img src="/profit-php-1/DZ/06/2/images/<?php echo $image; ?>" alt="<?php echo $image; ?>" width="240">
                </a>

                <?php if(++$x1 % 2 == 0) { echo '<br>';   } else { echo ''; } ?>

            <?php } ?>
        </div>
    </div>

    <br><br><br>

</body>
</html>