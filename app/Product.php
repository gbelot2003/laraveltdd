<?php

namespace app;

class Product
{
    protected $name;
    protected $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    function name()
    {
        return $this->name;
    }

    function price()
    {
        return $this->price;
    }

}
