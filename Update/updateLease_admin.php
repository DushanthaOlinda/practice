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
        <h2 class="text-dark"> Sewana Property (Admin) </h2>
        <form class="d-flex">
            <button type="button" class="d-block btn btn-primary m-3 w-100 p-4 "><a class="text-decoration-none text-white" href="../admin.php">Go back</a></button>
        </form>
    </div>
</nav>

<div class="frm m-auto">
    <div class="title">Update Lease</div>
    <form action="#" method="POST">
        <div class="user-details"></div>
        <div class="input-box">
            <span class="number">Enter the client number want to be updated:  </span>
            <input type="number" id="number" name="clientNumber" required></input>
        </div><br>

        <div class="input-box">
            <span class="number">Property Number:   </span>
            <input type="number" id="number" name="propertyNumber" required></input>
        </div><br>

        <div class="input-box">
            <span class="number">Employee ID:  </span>
            <input type="number" id="number" name="empID" required></input>
        </div><br>

        <div class="input-box">
            <span class="number">Monthly Rental:  </span>
            <input type="number" id="number" name="rental" required></input>
        </div><br> 

            <div class="payement-method">
                <div class="input-box">
                    <span class="type">Payment Method</span>
                    <input type="radio" id="credit card" name="paymentmethod" value="Credit Card" onclick="ShowHideDiv()" required>
                    <label for="person">Credit Card</label>
                    <input type="radio" id="cheque" name="paymentmethod" value="Cheque" onclick="ShowHideDiv()" required>
                    <label for="company">Cheque</label>
                    <input type="radio" id="cash" name="paymentmethod" value="Cash" onclick="ShowHideDiv()" required>
                    <label for="company">Cash</label>
                </div><br>

        <div class="input-box">
            <span class="date">Start Date:  </span>
            <input type="date" id="date" name="startDate" required></input>
        </div><br>

        <div class="input-box">
            <span class="date">Finish Date:  </span>
            <input type="date" id="date" name="finishDate" required></input>
        </div><br>

        <div class="btn btn-primary w-100">
            <input type="submit" class="text-white btn " id="btn" name="save" value="Update">
        </div>

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
        $clientnumber = $_POST['clientNumber'];
        $propertynumber = $_POST["propertyNumber"];
        $empid = $_POST['empID'];
        $rent = $_POST['rental'];
        $paymentmethod = $_POST['paymentmethod'];
        $sdate = $_POST['startDate'];
        $fdate = $_POST['finishDate'];

          $query1 = "UPDATE `lease` SET `client_number`='$clientnumber',`property_number`='$propertynumber',`emp_ID`='$empid',`monthly_rent`='$rent',`payment_method`='$paymentmethod',`started_date`='$sdate',`finished_date`='$fdate' WHERE client_number = $clientnumber";
          $check = mysqli_query($conn,$query1);
?>
<div class="sql">
    <?php
        if($check)
        {
        echo "Record Updated successfully.<br>";
        echo $query1;
        }
        else
        {
        echo "Error:<br>" ,$query1.mysqli_error($conn);
        }
        mysqli_close($conn);
      }
?>
</div>
