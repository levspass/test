<?php


class BookProduct extends Product
{
    public $weight;

    public function __construct($sku, $name, $price, $productType, $weight)
    {
        parent::__construct($sku, $name, $price, $productType);
        $this->weight = $weight;
    }

    public function getInsertSQL()
    {
        $sql = 'INSERT INTO `products` SET 
            `sku` = "' . $this->sku . '", 
            `name` = "' . $this->name . '", 
            `price` = "' . $this->price . '",
            `productType` = "' . $this->productType . '",
            `weight` = "' . $this->weight . '";
        ';

        echo $sql . '<br>';

        return $sql;
    }
}