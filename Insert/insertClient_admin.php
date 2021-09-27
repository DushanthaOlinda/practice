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
            <label>Email: </label>
            <input type="email" id="email" name="email" required>
        </p>

        <p>
            <label>Full Name: </label>
            <input type="text" id="fullname" name="fullname" required>
        </p>

        <p>
            <label>NIC: </label>
            <input type="text" id="nic" name="nic" required>
        </p>

        <p>
            <label>Branch No: </label>
            <input type="number" id="branchNo" name="branchNo" required>
        </p>

        <p>
            <label>Property: </label>
            <input type="text" id="property" name="property" required>
        </p>

        <p>
            <label>Monthly Rentel: </label>
            <input type="number" id="rental" name="rental" required>
        </p>

        <p>
            <label>Rent Start Date: </label>
            <input type="date" id="rentstart" name="rentstart" required>
        </p>

        <p>
            <label>Payment Method: </label>
            <input type="radio" id="method" name="method" value="card" required>
            <label for="method">Card</label>
            <input type="radio" id="method" name="method" value="cheque" required>
            <label for="method">Cheque</label>
            <input type="radio" id="method" name="method" value="cash" required>
            <label for="method">Cash</label>  
        </p>

        <p>
            <label>Duration: </label>
            <input type="text" id="duration" name="duration" required>
        </p>

        <p>
            <label>Rent Finish Date: </label>
            <input type="date" id="rentfinish" name="rentfinish" required>
        </p>
        <br>
        <p>
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
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $nic = $_POST['nic'];
    $branchNo = $_POST['branchNo'];
    $property = $_POST['property'];
    $rental = $_POST['rental'];
    $rentstart = $_POST['rentstart'];
    $gender = $_POST['gender'];
    $duration = $_POST['duration'];
    $rentfinish = $_POST['rentfinish'];

    $sql = "INSERT INTO `client` (`client_number`, `Email`, `full_name`, `NIC`, `branch_no`, `property`, `monthly_rental`, `rent_start`, `payment_method`, `duration`, `finished_date`) VALUES (NULL, '$email', '$fullname', '$nic', '$branchNo', '$property', '$rental', '$rentstart', '$gender', '$duration', '$rentfinish')";

    if(mysqli_query($conn,$sql))
    {
      echo "New record created successfully.";
    }
    else
    {
      echo "Error:<br>" ,$sql.mysqli_error($conn);
    }
    mysqli_close($conn);
  }
  ?>