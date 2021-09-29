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
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $nic = $_POST['nic'];
    $branchNo = $_POST['branchNo'];
    $rent = $_POST['rent'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $check ;

    $sql1 = "INSERT INTO `client` (`client_number`, `Email`, `full_name`, `NIC`, `branch_no`) VALUES (NULL, '$email', '$fullname', '$nic', '$branchNo');";
    mysqli_query($conn,$sql1);
    $selectq= "SELECT MAX(client_number) FROM client;";
    $result = mysqli_query($conn,$selectq);
    $row= mysqli_fetch_assoc($result);
    $client_no = $row[("MAX(client_number)")];
    $sql2= "INSERT INTO `property_requirement`(`client_number`, `maximum_rental`, `type_of_property`, `date_willing_to_rent`) VALUES ('$client_no','$rent','$type','$date')";
    $check=mysqli_query($conn,$sql2);

    if($check)
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