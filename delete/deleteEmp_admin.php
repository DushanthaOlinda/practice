<?php
session_start();
if (!isset($_SESSION["UserRoll"])) 
{
    header("location:header.php");
}
if ($_SESSION["UserRoll"] != "Admin") 
{
    header("location:../header.php");
}


?>
<style>
    body
{
    background: rgb(161, 228, 164);
}

#admin
{
    font-size: 25px;
}

 a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
  font-size: 35px;
}
a:visited {
  color:blue;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
</style>

<a href="../admin.php">Go Back<br><br><br></a>


<script type="text/javascript">
    window.onload = function()
    {
      document.getElementById("dvMan").style.visibility = "hidden";
    }
    function ShowHideDiv() 
    {
        var chkMan = document.getElementById("manager");
        var chkSup = document.getElementById("supervisor");
        var chkAss = document.getElementById("assistant");
        var dvLbl = document.getElementById("dvMan");
        if(chkMan.checked || chkSup.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "Apointed date";
          document.getElementById("checkBox").setAttribute("type","date");
          dvLbl.style.visibility = "visible";
        }
        else if(chkAss.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "Supervisor Number";
          document.getElementById("checkBox").setAttribute("type","text");
          dvLbl.style.visibility = "visible";
        }
        else
        {
          dvLbl.style.visibility = "hidden";
        }
    }
</script>

<a href="../admin.php">Go Back<br><br><br></a>
<div id="frm">
    <form action="#" method="POST">
        <p>
            <label>Employee ID: </label>
            <input type="number" id="empID" name=empID required>
        </p>
        <br>
        <p>
            <input type="submit" id="btn" name="save" value="Submit">
        </p>
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

    $query= "DELETE FROM `employee` WHERE emp_ID=$emp_ID";
    $check=mysqli_query($conn,$query);

    if($check)
    {
      echo "Record Updated successfully.";
    }
    else
    {
      echo "Error:<br>" ,$query1.mysqli_error($conn),"<br>",$query2.mysqli_error($conn);
    }
    mysqli_close($conn);

  }
  ?>

