<?php
use App\Models\Collections\ProductsCollection;

/** @var ProductsCollection $products */
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
</head>
<body>

<a href="/create">Add new product</a>
new Product
<br>
<a href="/users">Members</a>
Members of ...
<br>
<a href="/app/Views/products/products.php">Products</a>
Products
<br>
<a href="/logout">Logout</a>
Logout


<br>
<br>

<br>
<?php /** @var ProductsCollection $products */ ?>
<?php foreach( $products->getProducts() as $product):?>
    <li><?php echo $product->getCategory();?>   </li>

    <ul id="myUL">

        <li > Brand: <?php echo $product->getName(); ?></li>
        <li > Aveilabile: <?php echo   $product->getQuantity() ; ?></li>
        <li>Created: <?php echo $product->getCreatedAt(); ?> </li>

    </ul>



<?php endforeach;?>
<br>
<?php foreach( $tags->getTags() as $tag):?>
    <li > Id: <?php echo $tag->getId(); ?></li>
    <li > Brand: <?php echo $tag->getCategory(); ?></li>

<?php endforeach;?>
</body>
</html>