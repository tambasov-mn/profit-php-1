<?php
require_once __DIR__ . '/classes/Uploader.php';

$uploader = new Uploader('file_image');
$result = $uploader->upload();

$status_upload = null;
if (true === $result) {
    $status_upload = 'Файл успешно загружен';
} else {
    $status_upload = 'Ошибка загрузки файла';
}
?>
<br><br>

<h2 style="text-align: center;">Статус загрузки: <?php echo $status_upload; ?></h2>

<div class="images-gallery-large" style="text-align: center;">
    <div style="text-align: center;">
        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']).'/'; ?>index.php">>> <b>НАЗАД</b> <<</a>
    </div>
</div>