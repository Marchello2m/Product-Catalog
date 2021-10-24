<?php

namespace App\Models;

class Tag
{
    private int $product_id ;
    private string $category;

    public function __construct(int $product_id, string $category)
    {
        $this->product_id= $product_id;
        $this->category = $category;
    }
    public function getId(): int
    {
        return $this->product_id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}