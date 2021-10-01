<?php
session_start();
if (!isset($_SESSION["UserRoll"])) {
  header("location:header.php");
}
if ($_SESSION["UserRoll"] != "Admin") {
  header("location:../header.php");
}


?>
<style>
  body {
    background: rgb(161, 228, 164);
  }

  #admin {
    font-size: 25px;
  }

  a:link {
    color: green;
    background-color: transparent;
    text-decoration: none;
    font-size: 35px;
  }

  a:visited {
    color: blue;
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

<script type="text/javascript">
  window.onload = function() {
    document.getElementById("dvMan").style.visibility = "hidden";
  }

  function ShowHideDiv() {
    var chkMan = document.getElementById("manager");
    var chkSup = document.getElementById("supervisor");
    var chkAss = document.getElementById("assistant");
    var dvLbl = document.getElementById("dvMan");
    if (chkMan.checked || chkSup.checked) {
      document.getElementById("MSA_cont").innerHTML = "Apointed date";
      document.getElementById("checkBox").setAttribute("type", "date");
      dvLbl.style.visibility = "visible";
    } else if (chkAss.checked) {
      document.getElementById("MSA_cont").innerHTML = "Supervisor Number";
      document.getElementById("checkBox").setAttribute("type", "text");
      dvLbl.style.visibility = "visible";
    } else {
      dvLbl.style.visibility = "hidden";
    }
  }
</script>

<div id="frm">
  <form action="#" method="POST">
    <p>
      <label>Name:</label>
      <input type="text" id="name" name="Name" required>
    </p>
    <p>
      <label>Gender</label>
        <input type="radio" id="gender" name="gender" value="M" required>
      <label for="gender">Male</label>
        <input type="radio" id="gender" name="gender" value="F" required>
        <label for="gender">Female</label>
    </p>
    <p>
      <lable>Start Date:</lable>
      <input type="date" id="start_date" name="start_date" value="Start_date" required>
    </p>
    <p>
      <label>Date of Birth:</label>
      <input type="date" id="DOB" name="DOB" value="DOB" required>
    </p>
    <p>
      <label>NIC:</label>
      <input type="text" id="NIC" name="NIC" required>
    </p>
    <p>
      <label>Contact Number:</label>
      <input type="tel" id="phone" name="phone" placeholder="0112345678" pattern="[0-9]{10}" required>
      <small>Format: 0112345678</small>
    </p>
    <p>
      <label>Salary(Rs.):</label>
      <input type="number" id="salary" name="salary" required>
    </p>
    <p>
      <label>Employee Type:</label>
      <input type="radio" id="manager" name="type" value="Manager" onclick="ShowHideDiv()" required>
      <label for="manager">Manager</label>
      <input type="radio" id="supervisor" name="type" value="Supervisor" onclick="ShowHideDiv()" required>
      <label for="supervisor">Supervisor</label>
      <input type="radio" id="assistant" name="type" value="Assistant" onclick="ShowHideDiv()" required>
      <label for="assistant">Assistant</label>
    <div id="dvMan">
      <label id="MSA_cont"></label>
      <input type="text" id="checkBox" name="checkBox" required>
    </div><br>
    </p>
    <p>
      <label>Branch Number</label>
      <input type="text" id="branchNo" name="branchNo">
    </p>
    <p>
      <input type="submit" id="btn" name="save" value="Submit">
    </p>
  </form>
</div>

<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sewana";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection Failed.");

if (isset($_POST['save'])) {
  $name = $_POST['Name'];
  $gender = $_POST['gender'];
  $start_date = $_POST['start_date'];
  $DOB = $_POST['DOB'];
  $NIC = $_POST['NIC'];
  $salary = $_POST['salary'];
  $phone = $_POST['phone'];
  $type = $_POST['type'];
  $brn = $_POST['branchNo'];
  $appDate = $_POST['checkBox'];

  $query1  = "INSERT INTO `employee` (`emp_ID`, `gender`, `name`, `start_date`, `salary`, `DOB`, `NIC`, `contact_number`, `emp_type`, `branch_no`) VALUES (NULL, '$gender', '$name', '$start_date', '$salary', '$DOB', '$NIC', '$phone', '$type', '$brn')";
  mysqli_query($conn, $query1);
  $selectQ = "SELECT MAX(emp_ID) FROM employee";
  $result = mysqli_query($conn, $selectQ);
  $row = mysqli_fetch_assoc($result);
  $emp_ID = $row[("MAX(emp_ID)")];
  $check;

  if ($type == "Manager") {
    $query2 = "INSERT INTO `manager` (`emp_ID`, `manager_number`, `appointed_date`) VALUES ('$emp_ID', NULL, '$appDate')";
    $check = mysqli_query($conn, $query2);
  } else if ($type == "Supervisor") {
    $query2 = "INSERT INTO `supervisor` (`emp_ID`, `supervisor_number`, `appointed_date`) VALUES ('$emp_ID', NULL, '$appDate')";
    $check = mysqli_query($conn, $query2);
  } else {
    $query2 = "INSERT INTO `assistant` (`emp_ID`, `supervisor_number`) VALUES ('$emp_ID', '$appDate')";
    $check = mysqli_query($conn, $query2);
  }

  if ($check) {
    echo "New record created successfully.<br><br>";
    echo $query1;
    echo "<br>";
    echo $query2;
  } else {
    echo "Error:<br>", $query1 . mysqli_error($conn), "<br>", $query2 . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>