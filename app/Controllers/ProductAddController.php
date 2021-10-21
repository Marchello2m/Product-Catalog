<?php

namespace App\Controllers;


use App\Models\Product;
use App\Repositories\MysqlProductsRepository;
use App\Repositories\ProductsRepository;
use Cassandra\Uuid;
use App\View;


class ProductAddController

{
    private ProductsRepository $productsRepository;

    public function __construct()
    {
        $this->productsRepository = new MysqlProductsRepository();

    }

    public function index(): View
    {
        $products = $this->productsRepository->getAll();

        return new View('app/Views/main.template.php', [
            'products' => $products
        ]);

    }


    public function create()
    {
        require_once 'app/Views/products/addProduct.template.php';
    }

    public function store()
    {
        $this->productsRepository->save(
            new Product(
                $_POST['id'],
                $_POST['name'],
                $_POST['category'],
                $_POST['quantity'],
                $_POST['createdAt'],
                $_POST['correctionTime'],
                $_POST['tagId']


            )
        );


        header('Location:/');
    }



}