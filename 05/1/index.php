<?php
/**
 * ДОМАШНЯЯ РАБОТА №5.:
 */
session_start();

require_once __DIR__ . '/functions.php';
$db_images = include __DIR__ . '/db/db-images.php';

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        h2 {
            text-transform: uppercase;
            text-align: center;
        }
        h3 {
            text-align: center;
        }
        .images-gallery a {
            text-decoration: none;
        }
        .images-gallery img {
            margin: 5px 5px 5px 5px;
            border: 1px solid mediumblue;
            box-shadow: 0px 0px 5px 1px #000000;
            width:  480px; /* 960 / 480 */ /* box-shadow: 3px 3px 30px 3px #000000; */
            height: 240px;
            z-index: 5;
        }
        .images-gallery img:hover {
            border: 2px solid cyan;
            box-shadow: 0px 0px 30px 5px #000000; /* x y  */
            width:  490px; /* 560px */
            height: 240px;
            z-index: 10;
        }
    </style>

    <title>Примитивная фотогалерея</title>
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

    <?php if ( null != getCurrentUser() ) {; ?>

        <h2><?php echo getCurrentUser(); ?></h2>
        <h3>вы можете загрузить файл с котиком в галерею</h3>

        <div style="text-align: center;">
            <form action="/profit-php-1/DZ/05/1/upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file_image">
                <br><br>
                <button type="submit">Загрузить</button>
            </form>

            <p>
                <?php if( isset($_SESSION['upload_status']) ) { echo $_SESSION['upload_status']; } else { echo ''; } ?>
            </p>
        </div>
    <?php } else {; ?>
        <h2 style="text-align: center;">залогиньтесь, чтобы загружать картинки</h2>

        <div style="text-align: center;">
            <a href="/profit-php-1/DZ/05/1/login.php">>> <b>ВОЙТИ</b> <<</a>
            <br><br>
        </div>
    <?php }; ?>

    <br>
    <hr>
    <!-- /2.2. Загрузка файлов от пользователя -->

    <br><br>
    <div style="text-align: center;">
        <div class="images-gallery">
            <?php $i = 0; ?>
            <?php foreach ($db_images as $key => $image) { ?>

                <a href="/profit-php-1/DZ/05/1/image.php?id=<?php echo $key; ?>">
                    <img src="/profit-php-1/DZ/05/1/images/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                </a>
                <?php if(++$i % 2 == 0) { echo '<br>';   } else { echo ''; } ?>

            <?php } ?>
        </div>
    </div>

    <br><br><br>

</body>
</html>