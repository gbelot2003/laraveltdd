<?php

use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase
{

    function testAProductHasName()
    {
        $product = new Product('Fallout 4', 55);
        $this->assertEquals('Fallout 4', $product->name());

    }

    function testAProductHasaPrice()
    {
        $product = new Product('Fallout 4', 55);
        $this->assertEquals(55, $product->price());
    }

}