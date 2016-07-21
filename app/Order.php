<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Order
{

    protected $products = [];

    public function add($product)
    {
        $this->products[] = $product;
    }

    public function products()
    {
        return $this->products;
    }

    public function total()
    {
        $total = 0;

        foreach($this->products as $product)
        {
            $total += $product->price();
        }

        return $total;
    }


}
