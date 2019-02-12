<?php
class Uploader
{
    protected $form_field_name; // [имя поля формы], от которого мы ожидаем загрузку файла
    protected $path            = __DIR__ . '/../images/';
    protected $types           = ['image/jpeg', 'image/png'];
    protected $file_size_limit = 10240000; // 10 Mb - максимальный размер загружаемого файла.

    // В конструктор передается [имя поля формы], от которого мы ожидаем загрузку файла
    public function __construct($form_field_name)
    {
        $this->form_field_name = $form_field_name;
    }

    // Метод isUploaded() проверяет - был ли загружен файл от данного имени поля
    // Еще проверим: соответствует ли тип файла 'image/jpeg' или 'image/png'
    protected function isUploaded()
    {
        if (isset($_FILES[$this->form_field_name])) {
            if (0 === $_FILES[$this->form_field_name]['error']) {
                if (in_array($_FILES[$this->form_field_name]['type'], $this->types, true)) {
                    if ($_FILES[$this->form_field_name]['size'] > $this->file_size_limit) {
                        return null;
                    } else {
                        return true;
                   }
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    // Метод upload() осуществляет перенос файла (если он был загружен!) из временного места в постоянное
    public function upload()
    {
        if (true === $this->isUploaded()) {
            return move_uploaded_file($_FILES[$this->form_field_name]['tmp_name'], $this->path . $_FILES[$this->form_field_name]['name']);
        }
        return null;
    }
}