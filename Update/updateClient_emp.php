<?php
session_start();
if (!isset($_SESSION["UserRoll"])) 
{
    header("location:header.php");
}
if ($_SESSION["UserRoll"] != "employee") 
{
    header("location:../header.php");
}


?>
<style>
    body
{
    background: rgb(161, 228, 164);
}

#admin
{
    font-size: 25px;
}

 a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
  font-size: 35px;
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
  background-color: #ddd;
  color: black;
}

</style>

<div class="topnav">
<a href="../emp.php">Go Back</a>
</div>
<br><br><br>

<div if="frm">
    <form action="#" method="POST">
        <p>
            <label>Enter client number you want to update: </label>
            <input type="text" id="client" name="client" required>
        </p>
        <p>
            <label>Email: </label>
            <input type="email" id="email" name="email" >
        </p>

        <p>
            <label>Branch No: </label>
            <input type="number" id="branch" name="branch" required>
        </p>

        <p>
            <input type="submit" id="btn" name="save" value="Submit">
        </p>
    </form>
</div>
<?php
  $dbServername = "localhost";
  $dbUsername = "emp";
  $dbPassword ="emp";
  $dbName = "sewana";
  
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection Failed.");

  if(isset($_POST['save']))
  {
    $client=$_POST['client'];
    $email = $_POST['email'];
    $branchNo = $_POST['branch'];

    $sql1 = "UPDATE `client` SET `Email`='$email',`branch_no`='$branchNo' WHERE `client_number`=$client";
    mysqli_query($conn,$sql1);

    if(mysqli_query($conn,$sql1))
    {
      echo "Record updated successfully.";
    }
    else
    {
      echo "Error:<br>" ,$sql1.mysqli_error($conn);
    }
    mysqli_close($conn);
  }
  ?>