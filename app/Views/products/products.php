<?php
include ("app/Repositories/MysqlProductsRepository.php");
include ("app/Models/Product.php");

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
<a href="/register">Add new Members</a>
Register new member
<br>
<a href="/logout">Logout</a>
Logout

<br>
(<a href="/app/Views/main.template.php">Back</a>)
back
<br>
<br>

<?php  foreach( $products->getProducts() as $product):?>
    <li><?php echo $product->getCategory();?>   </li>

    <ul id="myUL">

        <li > Brand: <?php echo $product->getName(); ?></li>
        <li > Aveilabile: <?php echo   $product->getQuantity() ; ?></li>
        <li>Created: <?php echo $product->getCreatedAt(); ?> </li>

    </ul>



<?php endforeach;?>

</body>
</html>