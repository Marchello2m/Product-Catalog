<?php

namespace App\Controllers;

use App\Repositories\ProductsRepository;
use App\Repositories\MysqlProductsRepository;

class ProductsController
{
  private ProductsRepository $productsRepository;

  public function __construct()
  {
      $this->productsRepository=new MysqlProductsRepository();

  }
  public function index()
  {
      $products=$this->productsRepository->getAll();

     //require_once 'app/Views/main.template.php';
require_once 'app/Views/products/index.template.php';
  }


}
