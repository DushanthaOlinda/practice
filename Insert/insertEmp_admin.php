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

<div class="frm m-auto ">
    <div class="title">Insert Employee</div>
    <form action="#" method="POST">
        <div class="user-details">
            <div class="input-box">
                <span class="name">Name</span>
                <input type="text" id="name" name="Name" required>
            </div>
            <div class="gender-details">
                <div class="input-box">
                    <span class="gender">Gender</span>
                      <input type="radio" id="gender" name="gender" value="M" required>
                    <label for="gender">Male</label>
                      <input type="radio" id="gender" name="gender" value="F" required>
                      <label for="gender">Female</label>
                </div>
            </div>
            <div class="input-box">
                <span class="start-date">Start Date</span>
                <input type="date" id="start_date" name="start_date" value="Start_date" required>
            </div>
            <div class="input-box">
                <span class="DOB">Date Of Birth</span>
                <input type="date" id="DOB" name="DOB" value="DOB" required>
            </div>
            <div class="input-box">
                <span class="NIC">NIC</span>
                <input type="text" id="NIC" name="NIC" required>
            </div>
            <div class="input-box">
                <span class="phone">Contact Number</span>
                <input type="tel" id="phone" name="phone" placeholder="0112345678" pattern="[0-9]{10}" required>
                <small>Format: 0112345678</small>
            </div>
            <div class="input-box">
                <span class="branchNo">Branch Number</span>
                <input type="number" id="branchNo" name="branchNo" required>
            </div>
            <div class="input-box">
                <span class="salary">Salary(Rs:)</span>
                <input type="number" id="salary" name="salary" required>
            </div>
            <div class="input-box">
                <span class="type">Employee Type:</span>
                <input type="radio" id="manager" name="type" value="Manager" onclick="ShowHideDiv()" required>
                <label for="manager">Manager</label>
                <input type="radio" id="supervisor" name="type" value="Supervisor" onclick="ShowHideDiv()" required>
                <label for="supervisor">Supervisor</label>
                <input type="radio" id="assistant" name="type" value="Assistant" onclick="ShowHideDiv()" required>
                <label for="assistant">Assistant</label>
                <div id="dvMan">
                    <label id="MSA_cont"></label>
                    <input type="text" id="checkBox" name="checkBox" required>
                </div>
            </div>
            <div class="btn btn-primary w-100">
                <input type="submit" class="text-white btn " id="btn" name="save" value="Insert">
            </div>
        </div>
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
    $check = false;

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