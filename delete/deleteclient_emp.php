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
</style>

<a href="../emp.php">Go Back<br><br><br></a>


<div id="frm">
    <form action="#" method="POST">
        <p>
            <label>Client Number: </label>
            <input type="number" id="client_number" name="client_number" required>
        </p>
        <br>
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
    $client_number= $_POST['client_number'];

    $query= "DELETE FROM `client` WHERE client_number=$client_number";
    $check=mysqli_query($conn,$query);

    if($check)
    {
      echo "Record Deleted successfully.";
    }
    else
    {
      echo "Error:<br>" ,$query1.mysqli_error($conn),"<br>",$query2.mysqli_error($conn);
    }
    mysqli_close($conn);

  }
  ?>