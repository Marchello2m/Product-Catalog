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
<h1> ADD Member</h1>

<a href="/">Back</a>
<br/>
<div>
    <form action="/register" method="POST">
        <div>

            <label for="email">E-Mail:</label>
            <input id="email" type="email" name="email"/>
        </div>
        <br/>
        <div>
            <label for="name">Name:</label>
            <input id="name" type="text" name="name"/>
        </div>
        <br/>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password"/>
        </div>
        <br/>
        <div>
            <label for="password_confirmation">Password conformation:</label>
            <input id="password_confirmation" type="password" name="password_confirmation"/>
        </div>
        <br/>
        <button type="submit">Submit</button>

    </form>
</div>

</body>
</html>