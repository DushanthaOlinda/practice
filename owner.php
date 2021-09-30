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
    font-size: 35px;
    font-family: monospace ;
    font-weight: bold;
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
    font-size: 20px;
    color: #fff;
    background: darkslategrey;
    padding: 5px;
}
/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: lightsalmon;
  color: black;
}
</style>

<div class="topnav">
<a href="logout.php">LogOut</a>
</div>

<div id="owner">
    <p>Owner</p>
</div><br>

<div class="frm">
<h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Show Options</u></b></h2>
    <form action="./show/showProperty_owner.php" method="POST">
        <input type="submit" id="btn" value="Show Property" name="show_prop">
    </form>
    <form action="./show/showAdvertisement_owner.php" method="POST">
        <input type="submit" id="btn" value="Show Advertisement" name="show_add">
    </form>
    <form action="./show/showClient_owner.php" method="POST">
        <input type="submit" id="btn" value="Show Client" name="show_client">
    </form>
    <form action="./show/showPropertyRequirement_owner.php" method="POST">
        <input type="submit" id="btn" value="Show Property Requirement" name="show_PR">
    </form>
    <form action="./show/showVisit_owner.php" method="POST">
        <input type="submit" id="btn" value="Show Visit" name="show_visit">
    </form>

</div>