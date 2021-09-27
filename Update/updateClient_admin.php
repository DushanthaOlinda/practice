<?php
session_start();
if (!isset($_SESSION["UserRoll"])) 
{
    header("location:header.php");
}
if ($_SESSION["UserRoll"] != "Admin") 
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
</style>
<a href="../admin.php">Go Back<br><br><br></a>
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
            <input type="submit" id="btn" name="save" value="Submit">
        </p>
    </form>
</div>
<?php
  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword ="";
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