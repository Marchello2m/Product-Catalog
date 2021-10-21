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
        $user='Marchello2m';
        $pass='fredis007';

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

                $product['id'],
                $product['name'],
                $product['category'],
                $product['quantity'],
                $product['createdAt'],
                $product['correctionTime'],
                $product['tagId']
            ));
        }
        return $productsCollection;

    }
    public function save(Product $product):void
    {
        $sql = "INSERT INTO products_in_store (name,category,quantity, createdAt,correctionTime,tagId)VALUES (?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $product->getName(),
            $product->getCategory(),
            $product->getQuantity(),
            $product->getCreatedAt(),
            $product->getCorrectionTime(),
            $product->getTagId()
        ]);
    }
    public function getOne(string $id): ?Product
    {
        $sql ="SELECT * FROM products_in_store  WHERE category =?";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute([$id]);
        $product =$stmt->fetch();

        return new  Product(
            $product['id'],
            $product['name'],
            $product['category'],
            $product['quantity'],
            $product['createdAt'],
            $product['correctionTime'],
            $product['tagId']
        );


    }

    public function merge()
    {
        $sql = "SELECT id_signup,id_products_in_store,
        FROM mid
        JOIN signup ON products_in_store
        ORDER BY id";

        $result = [];
        foreach ($mysqli->query($sql) as $row) {
            $data[$row['id']][] = $row;
        }
    }
}