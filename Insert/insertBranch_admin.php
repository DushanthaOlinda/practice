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
    header("location:header.php");
}
?>


<style>
    body {
        background-image: url('../assets/img/cp.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }


    .frm {
        align-content: center;
        /*padding-left: 50px;*/
        max-width: 700px;
        width: 80%;
        background: rgba(0, 0, 0, 0.5);
        padding: 25px 30px;
        border-radius: 5px;
        color: white;
        font-weight: bolder;

    }

    .frm .title {
        font-size: 25px;
        font-width: 500;
        position: relative;
    }

    .frm .title::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        background: linear-gradient(135deg, #71b7e6. #9b59b6);
    }

    .frm form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100%/2-20px);
    }

    form .user-details .input-box .name {
        display: block;
        margin-bottom: 5px;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border: #9b59b6;
    }

    @media (max-width:584px) {
        .frm {
            max-width: 100%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        .frm form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 0;
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

<div class="frm m-auto">
    <div class="title">Insert Branch</div>
    <form action="#" method="POST">
        <div class="user-details"></div>
    </form>
</div>

<!--<div class="frm">-->
<!--  <form action="#" method="POST">-->
<!--    <p>-->
<!--      <label>Contact Number:</label>-->
<!--      <input type="tel" id="phone" name="phone" placeholder="0112345678" pattern="[0-9]{10}" required>-->
<!--      <small>Format: 0112345678</small>-->
<!--    </p>-->
<!--    <p>-->
<!--      <label>Address:</label>-->
<!--      <input type="text" id="address" name="address" required>-->
<!--    </p>-->
<!--    <p>-->
<!--      <label>Email:</label>-->
<!--      <input type="email" id="email" name="email" required>-->
<!--    </p>-->
<!--    <p>-->
<!--      <label>District:</label>-->
<!--      <input type="text" id="district" name="district" required>-->
<!--    </p>-->
<!--    <p>-->
<!--      <input type="submit" id="btn" name="save" value="Submit">-->
<!--    </p>-->
<!--  </form>-->
<!--</div>-->

<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sewana";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection Failed.");

if (isset($_POST['save'])) {
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $district = $_POST['district'];

  $sql = "INSERT INTO `branch` (`branch_no`, `contact_number`, `address`, `email`, `district`) VALUES (NULL, '$phone', '$address', '$email', '$district')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully.";
  } else {
    echo "Error:<br>", $sql . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>