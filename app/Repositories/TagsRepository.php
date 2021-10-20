<?php

namespace App\Repositories;

use App\Models\Collections\TagsCollection;
use App\Models\Tag;


interface TagsRepository
{
    public function getAll(): TagsCollection;

    public function save(Tag $tag): void;

}