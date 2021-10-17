<?php
namespace App\Repositories;

use App\Models\Collections\ProductsCollection;
use App\Models\Product;

use PDO;
use PDOException;

class MysqlProductsRepository implements ProductsRepository
{
    private PDO $connection;

    public function __construct()
    {
        $host ='127.0.0.1';
        $db ='products';
        $user='';
        $pass='';

        $dsn ="mysql:host=$host;dbname=$db;charset=UTF8";
        try {
            $this->connection =new PDO($dsn,$user,$pass);
        }catch (PDOException $e){
            throw new PDOException($e->getMessage(),(int)$e->getCode());
        }
    }
    public function getAll():ProductsCollection
    {
        $sql = " SELECT * FROM products_in_store";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([]);

        $products= $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productsCollection = new ProductsCollection();

        foreach ($products as $product)
        {
            $productsCollection->addProduct(new Product(
                $product['name'],
                $product['category'],
                $product['quantity'],
                $product['createdAt'],
                $product['correctionTime']
            ));
        }
        return $productsCollection;

    }
    public function save(Product $product):void
    {
        $sql = "INSERT INTO products_in_store (name,category,quantity, createdAt,correctionTime)VALUES (?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $product->getName(),
            $product->getCategory(),
            $product->getQuantity(),
            $product->getCreatedAt(),
            $product->getCorrectionTime()
        ]);
    }
    public function getOne(string $id): ?Product
    {
        $sql ="SELECT * FROM products_in_store  WHERE category =?";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute([$id]);
        $product =$stmt->fetch();

        return new  Product(
            $product['name'],
            $product['category'],
            $product['quantity'],
            $product['createdAt'],
            $product['correctionTime']
        );


    }
}