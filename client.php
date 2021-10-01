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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css">
    <link rel="stylesheet" href="assets/css/Ludens---3-Edit-with-Summernote.css">
    <link rel="stylesheet" href="assets/css/Ludens---3-Edit.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<?php
session_start();
if (!isset($_SESSION["UserRoll"])) {
    header("location:header.php");
}
if ($_SESSION["UserRoll"] != "client") {
    header("location:header.php");
}
?>


<style>
    body {
        background-image: url('./assets/img/cp.png');
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

        <img src="./assets/img/logo.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
        <h2 class="text-dark"> Sewana Property ( Client) </h2>

        <form class="d-flex">
            <button type="button" class="d-block btn btn-primary m-3 w-100 p-4 "><a class="text-decoration-none text-white" href="logout.php">Log Out</a></button>
        </form>
    </div>
</nav>


<br>

<div class="frm">
    <div>
        <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Insert Options</u></b></h2>
        <form action="./Insert/insertClient_client.php" method="POST">
            <input type="submit"  class="btn  btn-o" id="btn" value="Insert Client" name="Insert_client">
        </form><br>
    </div>
    <div>
        <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Update Options</u></b></h2>
        <form action="./Update/updateProperty_client.php" method="POST">
            <input type="submit" class="btn  btn-o" id="btn" value="Update Property" name="Uptade_prop">
        </form><br>
    </div>
    <div>
        <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Show Options</u></b></h2>
    
        <form action="./show/showOwner_client.php" method="POST">
            <input type="submit" class="btn  btn-o" id="btn" value="Show Owner" name="show_owner">
        </form><br>
        <form action="./show/showProperty_client.php" method="POST">
            <input type="submit" class="btn  btn-o" id="btn" value="Show Property" name="show_prop">
        </form><br>
        <form action="./show/showVisit_client.php" method="POST">
            <input type="submit" class="btn  btn-o" id="btn" value="Show Visit" name="show_visit">
        </form><br>
        <form action="./show/showPropertyRequirement_client.php" method="POST">
            <input type="submit" class="btn  btn-o" id="btn" value="Show Property Requirement" name="show_requirement">
        </form>
    </div>
    <div>
        <h2 align="center" style="background-color: blanchedalmond;color:brown"><b><u>Delete Options</u></b></h2>
        <form action="./delete/deleteClient_client.php" method="POST">
            <input type="submit" class="btn  btn-o" id="btn" value="Delete Client" name="Delete_client">
        </form>
    </div>
</div>