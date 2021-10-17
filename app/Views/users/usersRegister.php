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

<h1>Users</h1>(<a href="/">Back</a>)



<br><br>
<ul>
    <?php foreach ($users->getUsers() as $user):?>
        <li>
            <?php echo $user->getId(); ?>
            <?php echo $user->getName(); ?>

            <?php echo $user->getEmail(); ?>
            <?php echo $user->getCreatedAt(); ?>

        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>