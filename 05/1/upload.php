<?php
session_start();

// Подключим функции:
require_once __DIR__ . '/functions.php';

if (isset($_FILES['file_image'])) {

    $file_size_limit = 10240000; // 10 Mb - максимальный размер загружаемого файла.
    $dir_upload      = __DIR__ . '/images/' . $_FILES['file_image']['name'];
    //return var_dump($dir_upload);


    if (0 == $_FILES['file_image']['error']) {
        // 4.*Решите задачу ограничения загрузки, например - только файлов JPEG и PNG.
        if ('image/jpeg' == $_FILES['file_image']['type'] || 'image/png' == $_FILES['file_image']['type']) {

            if ($_FILES['file_image']['size'] > $file_size_limit) {
                $_SESSION['upload_status'] = 'Картинка не должна весить не более 10 Mb.';
                header('Location: /profit-php-1/DZ/05/1/index.php');
            } else {
                // 3. Решите задачу загрузки файла от пользователя в заданное место на сервере с тем же именем файла,
                //    что он имел на компьютере пользователя.
                move_uploaded_file($_FILES['file_image']['tmp_name'], $dir_upload);

                $_SESSION['upload_status']    = 'Файл ' . $_FILES['file_image']['name'] . ' успешно загружен и добавлен в галерею.';
                addRecordToLogsUploads( getCurrentUser(), $_FILES['file_image']['name'] );

                header('Location: /profit-php-1/DZ/05/1/index.php');
            }
        } else {
            $_SESSION['upload_status'] = 'Не правильный тип файла. Можно загружать только JPEG или PNG.';
            header('Location: /profit-php-1/DZ/05/1/index.php');
        }
    } else {
        $_SESSION['upload_status'] = 'Выберите файл для загрузки.';
        header('Location: /profit-php-1/DZ/05/1/index.php');
    }
} else {
    $_SESSION['upload_status'] = 'Вы не выбрали картинку.';
    header('Location: /profit-php-1/DZ/05/1/index.php');
}


