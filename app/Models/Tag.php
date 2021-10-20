<?php

namespace App\Models;

class Tag
{
    private int $id ;
    private string $category;

    public function __construct(int $id, string $category)
    {
        $this->id = $id;
        $this->category = $category;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}