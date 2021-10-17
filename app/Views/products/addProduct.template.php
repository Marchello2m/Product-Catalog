<?php
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="">
<head>
    <meta charset="UTF-8">
    <title>ADD Product</title>
</head>
<body>
Add Product
<br>
(<a href="/app/Views/main.template.php">Back</a>)
<br>
<br/>
<div>
    <form action="/create" method="POST">
        <div>

            <label for="name">Name:</label>
            <input id="name" type="text" name="name"/>
        </div>
        <br/>
        <div>
            <label for="category">Category:</label>
            <input id="category" type="text" name="category"/>
        </div>
        <br/>
        <div>
            <label for="quantity">Quantity</label>
            <input id="quantity" type="text" name="quantity"/>
        </div>

        <br/>
        <button type="submit">Submit</button>

</body>
</html>