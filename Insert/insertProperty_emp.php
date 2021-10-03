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
if ($_SESSION["UserRoll"] != "employee") {
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


    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border: #9b59b6;
    }
    .sql {
        border: solid gray 1px;
        width: 100%;
        border-radius: 5px;
        background: rgb(0, 0, 0, 0.75);
        display: flex;
        padding: 50px;
        color: white;
        font-weight: bold;
        font-size: 25px;
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
        <h2 class="text-dark"> Sewana Property ( Employee) </h2>
        <form class="d-flex">
            <button type="button" class="d-block btn btn-primary m-3 w-100 p-4 "><a class="text-decoration-none text-white" href="../emp.php">Go back</a></button>
        </form>
    </div>
</nav>

<div class="frm m-auto">
    <div class="title">Insert Property</div>
    <form action="#" method="POST">
        <div class="user-details">
    <div class="input-box">
            <span class="address">Address</span>
            <input type="text" id="address" name="address" equired><br><br>
        </div>
        <div class="input-box">
            <span class="rooms">Number of Rooms</span>
            <input type="number" id="rooms" name="rooms"  required><br><br>
        </div>
        <div class="input-box">
                <span class="rental">Proposed Rental(Rs:)</span>
                <input type="number" id="rental" name="rental" required><br><br>
        </div>
        <div class="input-box">
                <span class="type">Type</span>
                <input type="text" id="type" name="type" required><br><br>
        </div>
        <div class="input-box">
                <span class="ownerid">Owner ID</span>
                <input type="number" id="ownerid" name="ownerid" required><br><br>
        </div>
        <div class="input-box">
                <span class="branchNo">Branch Number</span>
                <input type="number" id="branchNo" name="branchNo" required><br><br>
        </div>
        <div class="input-box">
                <span class="clientnumber">Client Number</span>
                <input type="number" id="clientnumber" name="clientnumber" required><br><br>
        </div>
        <div class="btn btn-primary w-100">
            <input type="submit" class="text-white btn " id="btn" name="save" value="Insert">
        </div>
        </div>
    </form>
</div>

<!-- <div class="frm">
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
</div> -->

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
    ?>
<div class="sql">
    <?php
    if(mysqli_query($conn,$sql))
     {
       echo "New record created successfully.";
       echo "<br>";
       echo $sql;
     }
     else
     {
       echo "Error:<br>" ,$sql.mysqli_error($conn);
     }
     mysqli_close($conn);
    }
?>
</div>