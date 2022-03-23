<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Product.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/DVD_discProduct.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/BookProduct.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/FurnitureProduct.php');


function debug($data) {
    echo '<pre>' . print_r($data) . '</pre><br>';
}

?><pre><?print_r($_POST);?></pre><?

// получаем соединение с базой данных
$database = new database();
$link = $database->getConnection();

if ($_POST) {
    $product = new Product($link);

    // установим значения свойствам товара
    $product->sku = $_POST['sku'];
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->category_id = $_POST['category_id'];

    // создание товара
    if ($product->create()) {
        echo "<div class='alert alert-success'>Товар был успешно создан.</div>";
    }

    // если не удается создать товар, сообщим об этом пользователю
    else {
        echo "<div class='alert alert-danger'>Невозможно создать товар.</div>";
    }
}