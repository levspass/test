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

//$mySQL = new database(localhost, root, "", products);

// = new $_POST['productType'](...array_values(array_diff($_POST, array(''))));

//$mySQL->query($product->getInsertSQL($mySQL->link));
