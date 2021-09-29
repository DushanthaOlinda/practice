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
            <label>Property Number: </label>
            <input type="number" id="propertynumber" name="propertynumber" required>
        </p>

        <p>
            <label>Client Number: </label>
            <input type="number" id="clientnumber" name="clientnumber" required>
        </p>

        <p>
            <label>Visited Date: </label>
            <input type="date" id="visitedDate" name="visitedDate" required>
        </p>

        <p>
            <label>Comment: </label>
            <input type="text" id="comment" name="comment" required>
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
      $propertynumber = $_POST['propertynumber'];
      $clientnumber = $_POST['clientnumber'];
      $visitedDate = $_POST['visitedDate'];
      $comment = $_POST['comment'];

      $sql= " INSERT INTO `visit` (`property_number`, `client_number`, `visited_date`, `comment`) VALUES ('$propertynumber', '$clientnumber', '$visitedDate', '$comment')";

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