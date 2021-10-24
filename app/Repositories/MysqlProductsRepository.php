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
                $product['quantity'],
                $product['tagId'],
                $product['createdAt'],
                $product['correctionTime']


            ));
        }
        return $productsCollection;

    }
    public function save(Product $product):void
    {
        $sql = "INSERT INTO products_in_store (id,name,quantity,tagId,createdAt,correctionTime)VALUES (?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $product->getId(),
            $product->getName(),
            $product->getQuantity(),
            $product->getTagId(),
            $product->getCreatedAt(),
            $product->getCorrectionTime()


        ]);
    }
    public function getOne(string $id): ?Product
    {
        $sql ="SELECT * FROM products_in_store  WHERE id =?";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute([$id]);
        $product =$stmt->fetch();

        return new  Product(
            $product['id'],
            $product['name'],
            $product['quantity'],
            $product['tagId'],
            $product['createdAt'],
            $product['correctionTime']


        );


    }

    public function delete(Product $product):void
    {
        if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem'])) {
            $sql = "DELETE FROM products_in_store where id=? ";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$product->getId()]);
        }
    }


}