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

<div if="frm">
    <form action="#" method="POST">
        <p>
            <label>Client number: </label>
            <input type="text" id="client" name="client" required>
        </p>
        <p>
            <label>Maximum Rent</label>
            <input type="number" id="rent" name="rent" required>
        </p>
        <p>
            <label>Type of Property</label>
            <input type="text" id="type" name="type" required>
        </p>
        <p>
            <label>Date Willing to Rent</label>
            <input type="date" id="date" name="date" required>
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
    $client = $_POST['client'];
    $rent = $_POST['rent'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $check ;

    $sql2= "INSERT INTO `property_requirement`(`client_number`, `maximum_rental`, `type_of_property`, `date_willing_to_rent`) VALUES ('$client','$rent','$type','$date')";
    $check=mysqli_query($conn,$sql2);

    if($check)
    {
      echo "New record added successfully.";
    }
    else
    {
      echo "Error:<br>" ,$sql.mysqli_error($conn);
    }
    mysqli_close($conn);
  }
  ?>