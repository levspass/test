<?php


class DVD_discProduct extends Product
{
    public $size;

    public function __construct($sku, $name, $price, $productType, $size)
    {
        parent::__construct($sku, $name, $price, $productType);
        $this->size = $size;
    }

    public function getInsertSQL()
    {
        $sql = 'INSERT INTO `products` SET 
            `sku` = "' . $this->sku . '", 
            `name` = "' . $this->name . '", 
            `price` = "' . $this->price . '",
            `productType` = "' . $this->productType . '",
            `size` = "' . $this->size . '";
        ';

        echo $sql . '<br>';

        return $sql;
    }
}