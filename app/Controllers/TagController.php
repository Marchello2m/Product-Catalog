<?php

namespace App\Controllers;


use App\Models\Tag;
use App\Repositories\MysqlTagsRepository;
use App\Repositories\TagsRepository;

class TagController
{
    private TagsRepository $tagsRepository;


    public function __construct()
    {

        $this->tagsRepository=new MysqlTagsRepository();
    }
    public function index()
    {
        $tags=$this->tagsRepository->getAll();

        //require_once 'app/Views/main.template.php';
       require_once 'app/Views/tags/tag.template.php';
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
