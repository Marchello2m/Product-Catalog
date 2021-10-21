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

<a href="/register">Add new Members</a>
Register new member
<br>
<a href="/login">Login</a>
Add new member

<br>
<a href="/tag">tag</a>
tag

<br>
<br>

<?php foreach( $products->getProducts() as $product):?>
    <li><?php echo $product->getCategory();?>   </li>

    <ul id="myUL">
        <li > Id: <?php echo $product->getId(); ?></li>
        <li > Brand: <?php echo $product->getName(); ?></li>
        <li > Aveilabile: <?php echo   $product->getQuantity() ; ?></li>
        <li>Created: <?php echo $product->getCreatedAt(); ?> </li>

    </ul>

<?php endforeach;?>


</body>
</html>