<?php

namespace App\Controllers;


use App\Models\Product;
use App\Repositories\ProductsRepository;
use App\Repositories\MysqlProductsRepository;
use App\View;


class ProductsController
{
    private ProductsRepository $productsRepository;


    public function __construct()
    {
        $this->productsRepository = new MysqlProductsRepository();

    }

    public function indexProducts(): View
    {
        $products = $this->productsRepository->getAll();

        return new View('products/products.twig', [
            'products' => $products
        ]);

    }

    public function index(): View
    {
        $products = $this->productsRepository->getAll();
        return new View('products/index.template.twig', [
            'products' => $products
        ]);

    }


    public function create():View
    {
        $products = $this->productsRepository->getAll();
        return new View('products/addProduct.template.twig', [
            'products' => $products
        ]);


    }

    public function store()
    {
       $this->productsRepository->save(
        new Product(
                $_POST['id'],
                $_POST['name'],
                $_POST['quantity'],
                $_POST['tagId'],
                $_POST['createdAt'],
                $_POST['correctionTime']

          )
        );


        header('Location:/');
    }

    public function delete(array $vars)
    {
        $id = $vars['id'] ?? null;
        if ($id == null) header('Location:/products');

        $task = $this->productsRepository->getOne($id);

        if ($task !== null) {
            $this->productsRepository->delete($task);
        }
        header('Location:/products');

    }
}