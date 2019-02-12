<?php

// ....................................................................................................................

$status_upload = null;

if (isset($_FILES['file_image'])) {

    $file_size_limit = 10240000; // 10 Mb - максимальный размер загружаемого файла.
    $dir_upload      = __DIR__ . '/images/' . $_FILES['file_image']['name'];
    //return var_dump($dir_upload);


    if (0 == $_FILES['file_image']['error']) {
        // 4.*Решите задачу ограничения загрузки, например - только файлов JPEG и PNG. ................................
        if ('image/jpeg' == $_FILES['file_image']['type'] || 'image/png' == $_FILES['file_image']['type']) {

            if ($_FILES['file_image']['size'] > $file_size_limit) {
                $status_upload = 'Картинка не должна весить не более 10 Mb.';
            } else {
                // 3. Решите задачу загрузки файла от пользователя в заданное место на сервере с тем же именем файла,
                //    что он имел на компьютере пользователя.
                move_uploaded_file($_FILES['file_image']['tmp_name'], $dir_upload);
                $status_upload = 'Файл ' . $_FILES['file_image']['name'] . ' загружается и скоро появится в галереи.';
            }
        } else {
            $status_upload = 'Не правильный тип файла. Можно загружать только JPEG или PNG.';
        }
    } else {
        $status_upload = 'Ошибка.';
    }
} else {
    $status_upload = 'Вы не выбрали картинку.';
}

// ....................................................................................................................
?>
<br><br>

<h2 style="text-align: center;">Статус загрузки: <?php echo $status_upload; ?></h2>

<div class="images-gallery-large" style="text-align: center;">
    <div style="text-align: center;">
        <a href="/profit-php-1/DZ/04/2/index.php">>> <b>НАЗАД</b> <<</a>
    </div>
</div>

