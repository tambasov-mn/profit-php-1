<?php
class TextFile
{
    public    $path; // путь до файла
    protected $data_read_from_file; // защищенное свойство (массив) для хранения прочтенных данных из файла

    // В конструктор передается путь до файла с данными гостевой книги - $path:
    public function __construct($path)
    {
        $this->path = $path; // путь до файла с данными гостевой книги

        // чтение данных из переданного в путь файла - в защищенное свойство $data_read_from_file:
        $this->data_read_from_file = file($this->path, FILE_IGNORE_NEW_LINES);
    }

    // Метод getData() возвращает массив записей гостевой книги
    public function getData()
    {
        return $this->data_read_from_file;
    }

    // Метод append($text) добавляет новую запись к массиву записей
    public function append($text)
    {
        $this->data_read_from_file[] = $text;
    }

    // Метод save() сохраняет массив в файл
    public function save()
    {
        file_put_contents($this->path, implode( PHP_EOL, $this->data_read_from_file));
    }
}