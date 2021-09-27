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

<div id ="frm">
  <form action = "#" method="POST">
    <p>
      <label>Enter the Employee number you want to update:</label>
      <input type="text" id="emp_ID" name="emp_ID">
    </p>
   <p>
     <label>Salary(Rs.):</label>
     <input type="number" id="salary" name="salary" required>
   </p>
   <p>
         <label>Employee Type:</label>
      <input type="radio" id="manager" name="type" value="S2M" onclick="ShowHideDiv()" required>
      <label for="manager">Supervisor --> Manager</label>
      <input type="radio" id="supervisor" name="type" value="A2S" onclick="ShowHideDiv()" required>
      <label for="supervisor">Assistant --> Supervisor</label>
      <input type="radio" id="assistant" name="type" value="NO" onclick="ShowHideDiv()" required>
      <label for="assistant">No promotion</label>
      <div id="dvMan">
       <label id="MSA_cont"></label>
      <input type="text" id="checkBox" name="checkBox" >
      </div><br>
   </p>
   <p>
     <label>Branch Number</label>
     <input type="text" id="branchNo" name="branchNo">
   </p>
   <p>
      <input type="submit" id="btn" name="submit" value="Submit">
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
      echo "Record Updated successfully.";
    }
    else
    {
      echo "Error:<br>" ,$query1.mysqli_error($conn),"<br>",$query2.mysqli_error($conn);
    }
    mysqli_close($conn);
  } 
?>