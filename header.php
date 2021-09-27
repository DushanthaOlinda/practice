<?php

include_once 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" href="styles.css">
    <title>Sewana property</title>
</head>

<body>

<style>
    body
{
    background: rgb(161, 228, 164);
}

h1
{
    font-size: 100px;
    font-style: italic;
    font-family: Georgia, 'Times New Roman', Times, serif;
    text-align: center;
    font-weight: bold;
    text-shadow: royalblue;
}
#frm
{
    border:solid gray 1px;
    width: 20%;
    border-radius: 5px;
    margin: 100px auto;
    background: seashell;
    padding: 50px;
    font-size: 50px;
}
#user
{
    font-size: 25px;
    font-weight: bold;
}
#pass
{
    font-size: 25px;
    font-weight: bold;
}
#btn
{
    font-size: 50px;
    color: #fff;
    background: #0c1cfa;
    padding: 5px;
    margin-left: 25%;
}

</style>

<h1>Sewana property renters</h1>

    <div id="frm">
            <form action="login.php" method="POST">
            <p>
            <label>Username:<br></label>
            <input type="text" id="user" name="Username" required>
            <br>
            <p>
            <label>Password:<br></label>
            <input type="password" id="pass" name="Password" required>
            <br><br>
            <input type="submit" id="btn" name="save" value="Login">
        </form> 
    </div>