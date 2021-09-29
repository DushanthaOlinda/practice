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

<div id="frm">
    <form action="#" method="POST">
        <p>
            <label>Address:</label>
            <input type="text" id="address" name="address" required>
        </p>

        <p>
            <label>Number of rooms: </label>
            <input type="number" id="rooms" name="rooms" required>
        </p>

        <p>
            <label>Proposed Rental: </label>
            <input type="number" id="rental" name="rental" required>
        </p>

        <p>
            <label>Type:</label>
            <input type="text" id="type" name="type" required>
        </p>

        <p>
            <label>Owner ID:</label>
            <input type="text" id="ownerid" name="ownerid" required >
        </p>

        <p>
            <label>Client Number:</label>
            <input type="text" id="clientnumber" name="clientnumber" required >
        </p>

        <p>
            <label>Branch No: </label>
            <input type="number" id="branchNo" name="branchNo" required >
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
     $address = $_POST['address'];
     $rooms = $_POST['rooms'];
     $rental = $_POST['rental'];
     $type = $_POST['type'];
     $ownerid = $_POST['ownerid'];
     $clientnumber = $_POST['clientnumber'];
     $branchNo = $_POST['branchNo'];

    $sql=" INSERT INTO `property` (`property_number`, `address`, `number_of_rooms`, `proposed_rental`, `type`, `owner_ID`, `client_number`, `branch_no`) VALUES (NULL, '$address', '$rooms', '$rental', '$type', $ownerid, $clientnumber, $branchNo)";
    
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