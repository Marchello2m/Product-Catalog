<?php

namespace App\Controllers;


use App\Models\Tag;
use App\Repositories\MysqlTagsRepository;
use App\Repositories\TagsRepository;
use App\View;

class TagController
{
    private TagsRepository $tagsRepository;


    public function __construct()
    {

        $this->tagsRepository=new MysqlTagsRepository();
    }
    public function index():View
    {
        $tags = $this->tagsRepository->getAll();
        return new View('tags/tag.template.twig', [
            'tags' => $tags
        ]);
    }
    public function store()
    {
        $this->tagsRepository->save(
            new Tag(
                $_POST['id'],
                $_POST['category'],
            )
        );


        header('Location:/');
    }


}
