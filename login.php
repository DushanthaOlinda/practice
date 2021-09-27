<?php

    session_start();
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword ="";
    $dbName = "sewana";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection Failed.");

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $userName = $_POST['Username'];
        $password = $_POST['Password'];
        $query ="select *from user where Username='$userName' and Password='$password'";
        $result =mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);
        $row= mysqli_fetch_assoc($result);
            if($count > 0)
            {
                $_SESSION["UserRoll"] = $row["UserRoll"];
                if($row["UserRoll"]=="Admin")
                {
                    header("location:admin.php");
                }
                else if($row["UserRoll"]=="employee")
                {
                    header("location:emp.php");
                }
                else if($row["UserRoll"]=="owner")
                {
                    header("location:owner.php");
                }
                else if($row["UserRoll"]=="client")
                {
                    header("location:client.php");
                }
            }
            else
            {
                echo "Login not successfull.Username or password incorrect";
            }
    }

?>

<?php

    include_once 'footer.php';
?>