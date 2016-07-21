<?php

use App\Product;
use App\Order;

class OrderTest extends PHPUnit_Framework_TestCase
{

    protected function CreateOrderWithProducts()
    {
        $order = new Order;

        $product1 = new Product('test1', 30);
        $product2 = new Product('test2', 70);

        $order->add($product1);
        $order->add($product2);

        return $order;
    }

    /** @test */
    function an_order_consist_of_products()
    {
        $order = $this->CreateOrderWithProducts();
        $this->assertCount(2, $order->products());

    }

    /** @test */
    function an_order_determine_the_total_of_the_products()
    {

        $order = new Order;

        $product1 = new Product('test1', 30);
        $product2 = new Product('test2', 70);

        $order->add($product1);
        $order->add($product2);

        $this->assertEquals(100, $order->total());

    }

}
