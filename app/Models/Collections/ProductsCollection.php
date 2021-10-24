<?php

namespace App\Models\Collections;


use App\Models\Product;


class ProductsCollection
{
    private array $products = [];

    public function __construct(array $products = [])
    {
        foreach ($products as $product) {
            $this->addProduct($product);
        }

    }

    public function addProduct(Product $product)
    {
        $this->products[$product->getName()] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}