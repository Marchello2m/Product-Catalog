<?php

namespace App\Repositories;

use App\Models\Collections\ProductsCollection;
use App\Models\Product;


interface ProductsRepository
{
    public function getAll():ProductsCollection;
    public function save(Product $product):void;

}