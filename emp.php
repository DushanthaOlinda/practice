<?php
    session_start();
    if(!isset($_SESSION["UserRoll"]))
    {
        header("location:header.php");
    }
    if($_SESSION["UserRoll"] != "employee")
    {
        header("location:header.php");
    }
?>

<style>

body
{
    background: rgb(161, 228, 164);
}

#emp
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
    font-size: 20px;
    color: #fff;
    background: #0c1cfa;
    padding: 5px;
}
</style>
<div id="emp">
    <p>Employee</p>
</div>

<a href="logout.php">Logout<br><br><br></a>

<div class="frm">
    <form action="./Insert/insertOwner_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Owner" name="Insert_owner">
    </form>
    <form action="./Insert/insert_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Property" name="Insert_prop">
    </form>
    <form action="./Insert/insert_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Advertisement" name="Insert_add">
    </form>
    <form action="./Insert/insert_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Client" name="Insert_client">
    </form>


    <form action="./Update/update.php" method="POST">
        <input type="submit" id="btn" value="Update Owner" name="Update_owner">
    </form>
    <form action="./Update/update.php" method="POST">
        <input type="submit" id="btn" value="Update Property" name="Uptade_prop">
    </form>
    <form action="./Update/update.php" method="POST">
        <input type="submit" id="btn" value="Update Advertisement" name="Update_add">
    </form>
    <form action="./Update/update.php" method="POST">
        <input type="submit" id="btn" value="Update Client" name="Update_client">
    </form>


    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Employee" name="show_emp">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Branch" name="show_branch">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Owner" name="show_owner">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Property" name="show_prop">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Newspapert" name="show_new">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Advertisement" name="show_add">
    </form>
    <form action="./show/show.php" method="POST">
        <input type="submit" id="btn" value="Show Client" name="show_client">
    </form>


    <form action="./delete/delete.php" method="POST">
        <input type="submit" id="btn" value="Delete Employee" name="Delete_emp">
    </form> 
    <form action="./delete/delete.php" method="POST">   
        <input type="submit" id="btn" value="Delete Branch" name="Delete_branch">
    </form> 
    <form action="./delete/delete.php" method="POST">
        <input type="submit" id="btn" value="Delete Owner" name="Delete_owner">
    </form> 
    <form action="./delete/delete.php" method="POST">
        <input type="submit" id="btn" value="Delete Property" name="Delete_prop">
    </form> 
    <form action="./delete/delete.php" method="POST">
        <input type="submit" id="btn" value="Delete Newspapert" name="Delete_new">
    </form> 
    <form action="./delete/delete.php" method="POST">
        <input type="submit" id="btn" value="Delete Advertisement" name="Delete_add">
    </form> 
    <form action="./delete/delete.php" method="POST">
        <input type="submit" id="btn" value="Delete Client" name="Delete_client">
    </form>
</div>