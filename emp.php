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
    background: darkslateblue;
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

<div id="emp">
    <p>Employee</p>
</div>

<h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Insert Options</u></b></h2>
<div class="frm">
    <form action="./Insert/insertOwner_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Owner" name="Insert_owner">
    </form>
    <form action="./Insert/insertProperty_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Property" name="Insert_prop">
    </form>
    <form action="./Insert/insertAdvertiesment_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Advertisement" name="Insert_add">
    </form>
    <form action="./Insert/insertClient_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Client" name="Insert_client">
    </form>
    <form action="./Insert/insertPropertyRequirenment_emp.php" method="POST">
        <input type="submit" id="btn" value="Insert Property Requirement" name="Insert_PR">
    </form>
    <form action="./Insert/insertVisit_emp.php" method="POST">
    <input type="submit" id="btn" value="Insert Visit" name="Insert_visit">
    </form>

    <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Update Options</u></b></h2>
    <form action="./Update/updateOwner_emp.php" method="POST">
        <input type="submit" id="btn" value="Update Owner" name="Update_owner">
    </form>
    <form action="./Update/updateProperty_emp.php" method="POST">
        <input type="submit" id="btn" value="Update Property" name="Uptade_prop">
    </form>
    <form action="./Update/updateClient_emp.php" method="POST">
        <input type="submit" id="btn" value="Update Client" name="Update_client">
    </form>

    <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Show Options</u></b></h2>
    <form action="./show/showEmp_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Employee" name="show_emp">
    </form>
    <form action="./show/showBranch_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Branch" name="show_branch">
    </form>
    <form action="./show/showOwner_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Owner" name="show_owner">
    </form>
    <form action="./show/showProperty_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Property" name="show_prop">
    </form>
    <form action="./show/showNewspaper_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Newspapert" name="show_new">
    </form>
    <form action="./show/showAdvertisement_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Advertisement" name="show_add">
    </form>
    <form action="./show/showClient_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Client" name="show_client">
    </form>
    <form action="./show/showVisit_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Visit" name="show_visit">
    </form>
    <form action="./show/showPropertyRequirement_emp.php" method="POST">
        <input type="submit" id="btn" value="Show Property Requirement" name="show_requirement">
    </form>

    <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Delete Options</u></b></h2>

    <form action="./delete/deleteOwner_emp.php" method="POST">
        <input type="submit" id="btn" value="Delete Owner" name="Delete_owner">
    </form> 
    <form action="./delete/deleteNewpaper_emp.php" method="POST">
        <input type="submit" id="btn" value="Delete Newspaper" name="Delete_new">
    </form> 
    <form action="./delete/deleteClient_emp.php" method="POST">
        <input type="submit" id="btn" value="Delete Client" name="Delete_client">
    </form>
</div>