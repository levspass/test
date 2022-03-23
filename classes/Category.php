<?php


class Category {
    // подключение к базе данных и имя таблицы
    private $link;
    private $table_name = "categories";

    /*
    // свойства объекта
    public $id;
    public $name;
    */

    public function __construct($link) {
        $this->link = $link;
    }

    // данный метод используется в раскрывающемся списке
    function read() {
        // запрос MySQL: выбираем столбцы в таблице «categories»
        $query = 'SELECT `id`, `name` FROM ' . $this->table_name; // ORDER BY `name`

        $result = $this->link->prepare($query);
        $result->execute();

        return $result;
    }

    /*
    // получение названия категории по её ID
    function readName() {
        // запрос MySQL
        $query = 'SELECT `name` FROM ' . $this->table_name; // WHERE `id` = ? limit 0, 1

        $result = $this->link->prepare($query);
        $result->bindParam(1, $this->id);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }
    */
}