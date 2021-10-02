<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Sewana property</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../assets/css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css">
    <link rel="stylesheet" href="../assets/css/Ludens---3-Edit-with-Summernote.css">
    <link rel="stylesheet" href="../assets/css/Ludens---3-Edit.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<?php
session_start();
if (!isset($_SESSION["UserRoll"])) {
    header("location:header.php");
}
if ($_SESSION["UserRoll"] != "Admin") {
<<<<<<< Updated upstream
    header("location:header.php");
=======
    header("location:../header.php");
>>>>>>> Stashed changes
}
?>

<<<<<<< Updated upstream

=======
?>
>>>>>>> Stashed changes
<style>
    body {
        background-image: url('../assets/img/cp.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }


    .frm {
        border: solid gray 1px;
        width: 100%;
        border-radius: 5px;
        background: rgb(0, 0, 0, 0.5);
        display: flex;
        padding: 50px;
    }

    .frm div {
        padding-left: 5%;
    }

    .btn-o {
        background-color: lightgreen;
    }


    @media (max-width:1180px) {
        .frm {
            display: flex;
            flex-direction: column;
        }

    }
</style>

<nav class="navbar navbar-light bg-transparent">
    <div class="container-fluid">
        <img src="../assets/img/logo.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
        <h2 class="text-dark"> Sewana Property ( Admin) </h2>
        <form class="d-flex">
            <button type="button" class="d-block btn btn-primary m-3 w-100 p-4 "><a class="text-decoration-none text-white" href="../admin.php">Go back</a></button>
        </form>
    </div>
</nav>

<script type="text/javascript">
    window.onload = function()
    {
      document.getElementById("dvMan").style.visibility = "hidden";
    }
    function ShowHideDiv()
    {
        var chkMan = document.getElementById("person");
        var chkAss = document.getElementById("company");
        var dvLbl = document.getElementById("dvMan");
        if(chkMan.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "NIC";
          document.getElementById("checkBox").setAttribute("type","text");
          dvLbl.style.visibility = "visible";
        }
        else if(chkAss.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "Company ID";
          document.getElementById("checkBox").setAttribute("type","text");
          dvLbl.style.visibility = "visible";
        }
        else
        {
          dvLbl.style.visibility = "hidden";
        }
    }
</script>

<div class="frm">
  <form action="#" method="POST">
    <p>
      <label>Name:</label>
      <input type="text" id="name" name="name" required>
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
      <label>Branch Number</label>
      <input type="text" id="branchNo" name="branchNo" required>
    </p>
    <p>
         <label>Owner Type:</label>
      <input type="radio" id="person" name="type" value="Person" onclick="ShowHideDiv()" required>
      <label for="person">Person</label>
      <input type="radio" id="company" name="type" value="Company" onclick="ShowHideDiv()" required>
      <label for="company">Company</label>
      <div id="dvMan">
       <label id="MSA_cont"></label>
      <input type="text" id="checkBox" name="checkBox" required>
      </div><br>
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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $brn = $_POST['branchNo'];
    $type = $_POST['type'];
    $checkBox = $_POST['checkBox'];

    $quaery1 = "INSERT INTO `owner` (`owner_ID`, `address`, `name`, `email`, `contact_number`, `branch_no`, `owner_type`) VALUES (NULL, '$address', '$name', '$email', '$phone', '$brn', '$type')";
    mysqli_query($conn, $quaery1);
    $selectQ = "SELECT MAX(owner_ID) FROM owner";
    $result = mysqli_query($conn, $selectQ);
    $row = mysqli_fetch_assoc($result);
    $owner_ID = $row[("MAX(owner_ID)")];
    $check;

    if ($type == "Person") {
        $query2 = "INSERT INTO `person` (`NIC`, `owner_ID`) VALUES ('$checkBox', '$owner_ID')";
        $check = mysqli_query($conn, $query2);
    } else {
        $query2 = "INSERT INTO `company` (`company_ID`, `owner_ID`) VALUES ('$checkBox', '$owner_ID')";
        $check = mysqli_query($conn, $query2);
    }

    if ($check) {
        echo "New record created successfully.";
    } else {
        echo "Error:<br>", $query1 . mysqli_error($conn), "<br>", $query2 . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>