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

<a href="/">Back</a>
<br/>
<h1>LogIN</h1>
<br>
<div>
    <form action="/login" method="POST">
        <div>




            <label  for="email">E-Mail:</label>
            <input id="email" type="email" name="email"/>
        </div>



        <br/>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password"/>
        </div>
        <br/>

        <br/>
        <button type="submit">Submit</button>
    </form>
</div>



</body>
</html>