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
            <label>Enter the owner number:</label>
            <input type="number" id="ownerID" name="ownerID">
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
            <label>Contact Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="0112345678" pattern="[0-9]{10}" required>
            <small>Format: 0112345678</small>
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
          $owner_no = $_POST['ownerID'];
          $address = $_POST['address'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];

          $query1 = "UPDATE `owner` SET `address`='$address',`email`='$email',`contact_number`='$phone' WHERE owner_ID = $owner_no";
          $check = mysqli_query($conn,$query1);
          
        if($check)
        {
        echo "Record Updated successfully.";
        }
        else
        {
        echo "Error:<br>" ,$query1.mysqli_error($conn);
        }
        mysqli_close($conn);
      }
?>