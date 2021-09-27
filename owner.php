<?php
    session_start();
    if(!isset($_SESSION["UserRoll"]))
    {
        header("location:header.php");
    }
    if($_SESSION["UserRoll"] != "owner")
    {
        header("location:header.php");
    }
?>

<style>

body
{
    background: rgb(161, 228, 164);
}

#owner
{
    font-size: 25px;
}

 a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
  font-size: 25px;
}
a:visited {
  color:blue;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}

#frm
{
    border:solid gray 1px;
    width: 20%;
    border-radius: 5px;
    margin: 100px auto;
    background: seashell;
    padding: 50px;
}
#btn
{
    font-size: 50px;
    color: #fff;
    background: #0c1cfa;
    padding: 5px;
}
</style>
<div id="client">
    <p>Client</p>
</div>

<a href="logout.php">Logout<br><br><br></a>

<div class="frm">

<form action="./show/show.php" method="POST">
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Owner" name="show_owner">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Property" name="show_prop">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Advertisement" name="show_add">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Client" name="show_client">
    </form>

</div>