<?php
namespace App\Controllers;
use App\Repositories\MysqlProductsRepository;
use App\Repositories\ProductsRepository;

class Conteiner
{
    private array $conteiner=[];

    public function register(string $interface,object $object ) :void
    {
        $this->conteiner[$interface]= $object;
    }

    public function getConteiner(string $interface): object
    {
        return $this->conteiner[$interface];
    }
}

