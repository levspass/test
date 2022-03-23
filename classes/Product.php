<?php


class Product
{
    // подключение к базе данных и имя таблицы
    private $conn;
    private $table_name = "products";

    // свойства объекта
    public $id;
    public $sku;
    public $name;
    public $price;
    public $category_id;

    public function __construct($db) {
        $this->conn = $db;
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

        $stmt = $this->conn->prepare($query);

        // опубликованные значения
        $this->sku = htmlspecialchars(strip_tags($this->sku));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // привязываем значения
        $stmt->bindParam(":sku", $this->sku);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":category_id", $this->category_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*
    public function __construct($sku, $name, $price, $productType)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
    }
    */

    //abstract public function getInsertSQL();
}