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
<body>
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


    .table-responsive {
        border: solid gray 1px;
        width: 100%;
        border-radius: 5px;
        background: rgba(0, 0, 0, 0.75);
        display: flex;
        padding: 50px;
    }

    .table div {
        color: white;
        padding-left: 5%;
    }

    .sql{
        border: solid gray 1px;
        width: 100%;border-radius: 5px;
        background : rgba(0, 0, 0, 0.75);
        display: flex;
        padding: 50px;
        color: white;
        font-weight: bold;
        font-size: 25px;
    }



    @media (max-width:1180px) {
        .table-responsive{
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

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sewana";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection Failed.");

$quary = "  SELECT  * from employee LEFT JOIN manager on employee.emp_ID=manager.emp_ID
           LEFT JOIN supervisor on employee.emp_ID=supervisor.emp_ID
            LEFT JOIN assistant on employee.emp_ID=assistant.emp_ID;";
$records = mysqli_query($conn, $quary);
if (mysqli_num_rows($records) > 0){}
else {
    $msg = "No Record found";
}
?>
<div class="table-responsive">
    <table class="table-dark table-striped table-hover table-bordered border-light">
        <caption class="table-dark w-100" >Employee Details</caption>
        <thead>
        <th>Employee ID</th>
        <th>Gender</th>
        <th>Name</th>
        <th>Start Date</th>
        <th>Salary</th>
        <th>Date Of Birth</th>
        <th>NIC</th>
        <th>Contact Number</th>
        <th>Employee Type</th>
        <th>Branch Number</th>
        <th>Appointed Date/Supervisor Number(only for Assistants)</th>
        <th>Type ID</th>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($records))
        {

            ?>
            <tr>
                <td><?php echo $row['emp_ID']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['DOB']; ?></td>
                <td><?php echo $row['NIC']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td><?php echo $row['emp_type']; ?></td>
                <td><?php echo $row['branch_no']; ?></td>
                <td><?php if ($row['emp_type'] == "Manager") {
                        echo $row['appointed_date'];
                    } else if ($row['emp_type'] == "Supervisor") {
                        echo $row['appointed_date'];
                    } else {
                        if(isset($row['supervisor_number'])) {
                            echo $row['supervisor_number'];
                        }else{
                            echo ' ';
                        }
                    }?>
                </td>
                <td><?php
                    if ($row['emp_type'] == "Manager") {
                        echo $row['manager_number'];
                    } else if ($row['emp_type'] == "Supervisor") {
                        if(isset($row['supervisor_number'])) {
                            echo $row['supervisor_number'];
                        }else{
                            echo ' ';
                        }
                    } else {
                        if(isset($row['assistant_no'])) {
                            echo $row['assistant_no'];
                        }else{
                            echo '';
                        }
                    }
                    ?>
                </td>
            </tr>
            <?php
        }?>
    </table>
</div>
<div class="sql">
    <?php
    echo "Sql statement:-<br>",$quary;
    mysqli_close($conn);
    ?>
</div>
</body>
</html>