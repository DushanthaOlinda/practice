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
            <label>Enter the Property number:</label>
            <input type="number" id="propNo" name="propNo">
        </p>
        <p>
            <label>Number of rooms:</label>
            <input type="number" id="rof" name="rof" required>
        </p>
        <p>
            <label>proposed rent:</label>
            <input type="number" id="propRent" name="propRent" required>
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
        $propNo =$_POST['propNo'];
        $rof =$_POST['rof'];
        $propRent = $_POST['propRent'];

        $query1 = "UPDATE `property` SET `number_of_rooms`=$rof,`proposed_rental`=$propRent WHERE property_number=$propNo";
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