<?php

use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase
{

    protected $product;

    public function setUp()
    {
        $this->product = new Product('Fallout 4', 55);
    }

    function testAProductHasName()
    {
        $this->assertEquals('Fallout 4', $this->product->name());
    }

    function testAProductHasaPrice()
    {
        $this->assertEquals(55, $this->product->price());
    }

}