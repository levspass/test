<?php


class Product
{
    // подключение к базе данных и имя таблицы
    private $link;
    private $table_name = "products";

    // свойства объекта
    public $id;
    public $sku;
    public $name;
    public $price;
    public $category_id;

    public function __construct($link) {
        $this->link = $link;
    }

    // метод создания товара
    function create() {
        // запрос MySQL для вставки записей в таблицу БД «products»
        $query = "INSERT INTO " . $this->table_name . " SET
            sku=:sku, 
            name=:name, 
            price=:price, 
            category_id=:category_id
        ";

        $result = $this->link->prepare($query);

        // опубликованные значения
        $this->sku = htmlspecialchars(strip_tags($this->sku));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // привязываем значения
        $result->bindParam(":sku", $this->sku);
        $result->bindParam(":name", $this->name);
        $result->bindParam(":price", $this->price);
        $result->bindParam(":category_id", $this->category_id);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }
}