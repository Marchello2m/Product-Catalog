<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use function App\Exceptions\checkNum;

class Product
{
    private string $id;
    private string $name;
    private int $quantity;
    private int $tagId;
    private string $createdAt;
    private string $correctionTime;

    public function __construct(
        string $id,
        string $name,
        int $quantity,
        int $tagId ,
        ?string $createdAt = null,
        ?string $correctionTime = null

    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
       $this->tagId = $tagId;
        $this->createdAt = $createdAt ?? Carbon::now();
        $this->correctionTime = $correctionTime ?? Carbon::now();

    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getCorrectionTime(): string
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


}