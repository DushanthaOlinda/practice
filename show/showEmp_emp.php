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
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
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

    .sql {
        border: solid gray 1px;
        width: 100%;
        border-radius: 5px;
        background: rgba(0, 0, 0, 0.75);
        display: flex;
        padding: 50px;
        color: white;
        font-weight: bold;
        font-size: 25px;
    }


    @media (max-width: 1180px) {
        .table-responsive {
            display: flex;
            flex-direction: column;
        }

    }
</style>

<nav class="navbar navbar-light bg-transparent">
    <div class="container-fluid">
        <img src="../assets/img/logo.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
        <h2 class="text-dark"> Sewana Property ( Employee) </h2>
        <form class="d-flex">
            <button type="button" class="d-block btn btn-primary m-3 w-100 p-4 "><a
                        class="text-decoration-none text-white" href="../emp.php">Go back</a></button>
        </form>
    </div>
</nav>

<?php

$servername = "localhost";
$username = "emp";
$password = "emp";
$dbname = "sewana";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection Failed.");

$query = "SELECT * FROM `employee`;";
$result = mysqli_query($conn, $query);
if ($conn->affected_rows > 1)
{
    ?>
    <div class="table-responsive">
        <table class="table-dark table-striped table-hover table-bordered border-light">
            <caption class="table-dark w-100">Employee Details</caption>
            <thead>
            <tr>
                <th>emp_ID</th>
                <th>gender</th>
                <th>name</th>
                <th>start_date</th>
                <th>salary</th>
                <th>DOB</th>
                <th>contact_number</th>
                <th>emp_type</th>
                <th>branch_no</th>
            </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {

                ?>
                <tr>
                    <td> <?php echo $row['emp_ID'] ?></td>
                    <td> <?php echo $row['gender'] ?></td>
                    <td> <?php echo $row['name'] ?></td>
                    <td> <?php echo $row['start_date'] ?></td>
                    <td> <?php echo $row['salary'] ?></td>
                    <td> <?php echo $row['DOB'] ?></td>
                    <td> <?php echo $row['contact_number'] ?></td>
                    <td> <?php echo $row['emp_type'] ?></td>
                    <td> <?php echo $row['branch_no'] ?></td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>
    <div class="sql">
        <?php
        echo "Sql statement:-<br>", $query;
        ?>
    </div>
    <?php
}

$query = "SELECT * FROM `supervisor`";
$result1 = mysqli_query($conn, $query);
if ($conn->affected_rows > 0)
{

    ?>

    <div class="table-responsive">
        <table class="table-dark table-striped table-hover table-bordered border-light">
            <caption class="table-dark w-100">Supervisor Details</caption>
            <thead>
            <tr>
                <th>emp_ID</th>
                <th>supervisor_number</th>
                <th>appointed_date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row1 = mysqli_fetch_array($result1)) {
                ?>
                <tr>
                    <td> <?php echo $row1['emp_ID'] ?></td>
                    <td> <?php echo $row1['supervisor_number'] ?></td>
                    <td> <?php echo $row1['appointed_date'] ?></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="sql">
        <?php
        echo "Sql statement:-<br>", $query;
        ?>
    </div>
    <?php

}
$query = "SELECT * FROM `manager`";
$result1 = mysqli_query($conn, $query);
if ($conn->affected_rows > 0)
{
    ?>

    <div class="table-responsive">
        <table class="table-dark table-striped table-hover table-bordered border-light">
            <caption class="table-dark w-100">Supervisor Details</caption>
            <thead>
            <tr>
                <th>emp_ID</th>
                <th>manager_number</th>
                <th>appointed_date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row1 = mysqli_fetch_array($result1)) {
                ?>
                <tr>
                    <td> <?php echo $row1['emp_ID'] ?></td>
                    <td> <?php echo $row1['manager_number'] ?></td>
                    <td> <?php echo $row1['appointed_date'] ?></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="sql">
        <?php
        echo "Sql statement:-<br>", $query;
        ?>
    </div>

    <?php

}
$query1 = "SELECT * FROM `assistant`";
$result1 = mysqli_query($conn, $query1);
if ($conn->affected_rows > 0)
{
    ?>
    <div class="table-responsive">
        <table class="table-dark table-striped table-hover table-bordered border-light">
            <caption class="table-dark w-100">Assistant Details</caption>
            <thead>
            <tr>
                <th>emp_ID</th>
                <th>supervisor_number</th>
                <th>assistant_no</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row1 = mysqli_fetch_array($result1)) {
                ?>
                <tr>
                    <td> <?php echo $row1['emp_ID'] ?></td>
                    <td> <?php echo $row1['supervisor_number'] ?></td>
                    <td> <?php echo $row1['assistant_no'] ?></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="sql">
        <?php
        echo "Sql statement:-<br>", $query;
        ?>
    </div>
    <?php


}
?>


</body>
</html>