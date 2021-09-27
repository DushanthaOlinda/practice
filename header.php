<?php

include_once 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" href="styles.css">
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
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

<!-- <style>
    body
{
    background: rgb(161, 228, 164);
}

h1
{
    font-size: 100px;
    font-style: italic;
    font-family: Georgia, 'Times New Roman', Times, serif;
    text-align: center;
    font-weight: bold;
    text-shadow: royalblue;
}
#frm
{
    border:solid gray 1px;
    width: 20%;
    border-radius: 5px;
    margin: 100px auto;
    background: seashell;
    padding: 50px;
    font-size: 50px;
}
#user
{
    font-size: 25px;
    font-weight: bold;
}
#pass
{
    font-size: 25px;
    font-weight: bold;
}
#btn
{
    font-size: 50px;
    color: #fff;
    background: #0c1cfa;
    padding: 5px;
    margin-left: 25%;
}

</style> -->

<section class="login-dark">
        <form action="login.php" method="POST">
            <h2 class="visually-hidden">Login Form</h2>
            <h1 class="font-monospace text-uppercase text-center border rounded-0">Sewana Property&nbsp;</h1>
            <div class="illustration"><i class="icon ion-ios-home"></i></div><input class="placeholder border rounded-pill border-primary form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" name="Username" placeholder="User Name" autofocus="" title="Enter User Name">
            <div class="mb-3"></div>
            <div class="mb-3"><input class="placeholder border rounded-pill border-primary form-control" type="password" name="Password" placeholder="Password"></div>
            <div class="mb-3"><button class="btn btn-primary font-monospace text-uppercase border rounded-pill d-block w-100" type="submit">Log In</button><button class="btn btn-primary font-monospace text-uppercase border rounded-pill d-block w-100" type="reset">RESET</button></div>
            <div class="btn-group" role="group"></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="assets/js/Ludens---3-Edit.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-1.js"></script>
    <script src="assets/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.js"></script>
    <script src="assets/js/Ludens---3-Edit-with-Summernote-1.js"></script>
    <script src="assets/js/Ludens---3-Edit-with-Summernote.js"></script>
    </body>
</html>