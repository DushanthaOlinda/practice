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
<a href="../admin.php">Go Back</a>
</div>
<br><br><br>

<div id="frm">
  <form action="#" method="POST">
  <p>
     <label>Contact Number:</label>
     <input type="tel" id="phone" name="phone" placeholder="0112345678" pattern="[0-9]{10}" required>
     <small>Format: 0112345678</small>
   </p>
   <p>
     <label>Address:</label>
     <input type="text" id="address" name="address" required>
   </p>
   <p>
     <label>Email:</label>
     <input type="email" id="email" name="email" required>
   </p>
   <p>
     <label>District:</label>
     <input type="text" id="district" name="district" required>
   </p>
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
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $district = $_POST['district'];

    $sql = "INSERT INTO `branch` (`branch_no`, `contact_number`, `address`, `email`, `district`) VALUES (NULL, '$phone', '$address', '$email', '$district')";

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