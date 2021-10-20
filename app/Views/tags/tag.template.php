<?php

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
(<a href="/app/Views/main.template.php">Back</a>)
back
<br>
<br>
<br>
<br>

<form action="/tag" method="POST">
    <div>

        <label for="category">Name:</label>
        <input id="category" type="text" name="category"/>
    </div>
    <br/>
    <br/>

    <br/>
    <button type="submit">Submit</button>


<?php foreach( $tags->getTags() as $tag):?>
    <li > Id: <?php echo $tag->getId(); ?></li>
    <li > Category: <?php echo $tag->getCategory(); ?></li>

<?php endforeach;?>
</body>
</html>