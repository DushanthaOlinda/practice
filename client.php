<?php
    session_start();
    if(!isset($_SESSION["UserRoll"]))
    {
        header("location:header.php");
    }
    if($_SESSION["UserRoll"] != "client")
    {
        header("location:header.php");
    }
?>

<style>

body
{
    background: rgb(161, 228, 164);
}

#client
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
<br>

<div id="client">
    <p>Client</p>
</div><br>

<div class="frm">

  
    <form action="./show/showBranch_client.php" method="POST">
        <input type="submit" id="btn" value="Show Branch" name="show_branch">
    </form>
    <form action="./show/showOwner_client.php" method="POST">
        <input type="submit" id="btn" value="Show Owner" name="show_owner">
    </form>
    <form action="./show/showProperty_client.php" method="POST">
        <input type="submit" id="btn" value="Show Property" name="show_prop">
    </form>
    <form action="./show/showPropertyRequirement_client.php" method="POST">
        <input type="submit" id="btn" value="Show Property Requirement" name="show_PR">
    </form>
    <form action="./show/showVisit_client.php" method="POST">
        <input type="submit" id="btn" value="Show visit" name="show_visit">
    </form>
</div>