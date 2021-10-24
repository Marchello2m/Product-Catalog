<?php
namespace App\Repositories;
use App\Models\Collections\TagsCollection;
use App\Models\Tag;
use PDO;
use PDOException;

class MysqlTagsRepository implements TagsRepository

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
            $this->connection=new PDO($dsn,$user,$pass);
        }catch (PDOException $e){
            throw new PDOException($e->getMessage(),(int)$e->getCode());
        }
    }

    public function getAll(): TagsCollection
    {
        $sql = " SELECT * FROM tags";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([]);

        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $collection = new TagsCollection();

        foreach ($tags as $tag) {
            $collection->add(new Tag(
                $tag['product_id'],
                $tag['category']

            ));
        }

        return $collection;
    }


    public function save(Tag $tag): void
    {
        $sql = "INSERT INTO tags (id,category)VALUES (?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $tag->getId(),
            $tag->getCategory(),

        ]);
    }
}