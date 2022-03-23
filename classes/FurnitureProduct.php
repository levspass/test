<?php


class FurnitureProduct extends Product
{
    public $length;
    public $width;
    public $height;

    public function __construct($sku, $name, $price, $productType, $length, $width, $height)
    {
        parent::__construct($sku, $name, $price, $productType);
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getInsertSQL()
    {
        $sql = 'INSERT INTO `products` SET 
            `sku` = "' . $this->sku . '", 
            `name` = "' . $this->name . '", 
            `price` = "' . $this->price . '",
            `productType` = "' . $this->productType . '",
            `length` = "' . $this->length . '",
            `width` = "' . $this->width . '",
            `height` = "' . $this->height . '";
        ';

        echo $sql . '<br>';

        return $sql;
    }
}