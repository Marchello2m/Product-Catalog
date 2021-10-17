<?php
namespace App\Models;

use Carbon\Carbon;

class Product
{
private string $name;
private string $category;
private int  $quantity;
private string $createdAt;
private string $correctionTime;

    public function __construct(
        string $name,
        string $category,
        int $quantity,
        ?string $createdAt=null,
        ?string $correctionTime=null
    )
    {

        $this->name = $name;
        $this->category = $category;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? Carbon::now();
        $this->correctionTime = $correctionTime?? Carbon::now();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getCorrectionTime()
    {
        return $this->correctionTime;
    }
}