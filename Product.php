<?php
class Product
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __GET($k)
    {
        return $this->$k;
    }
    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }
}
