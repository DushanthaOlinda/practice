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
    window.onload = function()
    {
      document.getElementById("dvMan").style.visibility = "hidden";
    }
    function ShowHideDiv() 
    {
        var chkMan = document.getElementById("manager");
        var chkSup = document.getElementById("supervisor");
        var dvLbl = document.getElementById("dvMan");
        if(chkMan.checked || chkSup.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "Apointed date";
          document.getElementById("checkBox").setAttribute("type","date");
          dvLbl.style.visibility = "visible";
        }
        else
        {
          dvLbl.style.visibility = "hidden";
        }
    }
</script>

<div class="frm m-auto">
    <div class="title">Update Employee</div>
    <form action="#" method="POST">
        <div class="user-details"></div>
        <div class="input-box">
            <label>Enter the employee number you want to update: </label>
            <input type="text" id="emp_ID" name="emp_ID">
        </div><br>

        <div class="input-box">
          <span class="number">Salary(Rs.): </span>
          <input type="number" id="salary" name="salary" required> 
        </div><br>

        <div class="input-box">
         <span class="type">Employee Type:</span><br>
        <input type="radio" id="manager" name="type" value="S2M" onclick="ShowHideDiv()" required>
      <label for="manager">Supervisor --> Manager</label><br>
      <input type="radio" id="supervisor" name="type" value="A2S" onclick="ShowHideDiv()" required>
      <label for="supervisor">Assistant --> Supervisor</label><br>
      <input type="radio" id="assistant" name="type" value="NO" onclick="ShowHideDiv()" required>
      <label for="assistant">No promotion</label><br>
      <div id="dvMan">
       <label id="MSA_cont"></label>
      <input type="text" id="checkBox" name="checkBox" required>
      </div><br>
    </div>

      <div class="input-box">
        <span class="number">Branch Number: </span> 
        <input type="number" id="number" name="branchNo" required>
      </div><br>

      <div class="btn btn-primary w-100">
            <input type="submit" class="text-white btn " id="btn" name="save" value="Insert">
        </div>
    </form>
</div>      

<?php
  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword ="";
  $dbName = "sewana";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection Failed.");

  
  if(isset($_POST['submit']))  
  {
    $emp_ID= $_POST['emp_ID'];
    $salary=$_POST['salary'];
    $type =$_POST['type'];
    $brn = $_POST['branchNo'];
    $promo = $_POST['checkBox'];
    $check =true ;

    $query1 = "SELECT emp_type FROM employee WHERE emp_ID='$emp_ID'";
    $result1 = mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_assoc($result1);
    $emp_type = $row1["emp_type"];
    if($emp_type == "Manager")
    {
      $query2 = "UPDATE `employee` SET `salary`=$salary,`branch_no`='$brn' WHERE emp_ID=$emp_ID";
      mysqli_query($conn,$query2);
    }
    else if($emp_type == "Supervisor")
    {
      
      echo "2";
      if($type == "S2M")
      {
        echo"1";
        $query2 = "UPDATE `employee` SET `salary` = '$salary', `emp_type` = 'Manager' WHERE `employee`.`emp_ID` = $emp_ID;";
        $query2.= "DELETE FROM `supervisor` WHERE emp_ID=$emp_ID;";
        $query2.= "INSERT INTO `manager`(`emp_ID`, `appointed_date`) VALUES ('$emp_ID','$promo')";
        $check= mysqli_multi_query($conn,$query2);
      }
      else
      {
        $query2 = "UPDATE `employee` SET `salary`='$salary',`branch_no`='$brn', WHERE emp_ID='$emp_ID'";
        $check = mysqli_query($conn,$query2);
      }
    }
    else if($emp_type == "Assistant")
    {
      
      if($type == "A2S")
      {
        $query2 = "UPDATE `employee` SET `salary` = '$salary', `emp_type` = 'Supervisor' WHERE `employee`.`emp_ID` = $emp_ID;";
        $query2.= "DELETE FROM `assistant` WHERE 'emp_ID'='$emp_ID';";
        $query2.= "INSERT INTO `supervisor`(`emp_ID`, `appointed_date`) VALUES ('$emp_ID','$promo');";
        $check= mysqli_multi_query($conn,$query2);
      }
      else
      {
        $query2 = "UPDATE `employee` SET `salary`='$salary',`branch_no`='$brn', WHERE emp_ID='$emp_ID'";
        $check = mysqli_query($conn,$query2);
      }
    }

    if($check)
    {
      echo "Record Updated successfully.<br>";
      echo $query1;
      echo $query2;
    }
    else
    {
      echo "Error:<br>" ,$query1.mysqli_error($conn),"<br>",$query2.mysqli_error($conn);
    }
    mysqli_close($conn);
  } 
?>