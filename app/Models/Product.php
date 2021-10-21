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
    private int $id;
    private int $tagId;

    public function __construct(
        int $id,
        string $name,
        string $category,
        int $quantity,
        string $createdAt,
        string $correctionTime,
        int $tagId

    )
    {

        $this->name = $name;
        $this->category = $category;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? Carbon::now();
        $this->correctionTime = $correctionTime?? Carbon::now();
        $this->id = $id;
        $this->tagId=$tagId;
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getTagId(): int
    {
        return $this->tagId;
    }

    public function setTagId(int $tagId): void
    {
        $this->tagId = $tagId;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }



}