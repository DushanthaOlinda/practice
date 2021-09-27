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
        var chkMan = document.getElementById("person");
        var chkAss = document.getElementById("company");
        var dvLbl = document.getElementById("dvMan");
        if(chkMan.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "NIC";
          document.getElementById("checkBox").setAttribute("type","text");
          dvLbl.style.visibility = "visible";
        }
        else if(chkAss.checked)
        {
          document.getElementById("MSA_cont").innerHTML = "Company ID";
          document.getElementById("checkBox").setAttribute("type","text");
          dvLbl.style.visibility = "visible";
        }
        else
        {
          dvLbl.style.visibility = "hidden";
        }
    }
</script>

<div id="frm">
  <form action="#" method="POST">
    <p>
      <label>Name:</label>
      <input type="text" id="name" name="name" required>
    </p>
    <p>
      <label>Address:</label>
      <input type="text" id="address" name="address" required>
    </p>
    <p>
      <label>Email:</label>
      <input type="email" id="email" name="email" required>
    </p>
    <p>
      <label>Contact Number:</label>
      <input type="tel" id="phone" name="phone" placeholder="0112345678" pattern="[0-9]{10}" required>
      <small>Format: 0112345678</small>
    </p>
    <p>
      <label>Branch Number</label>
      <input type="text" id="branchNo" name="branchNo" required>
    </p>
    <p>
         <label>Owner Type:</label>
      <input type="radio" id="person" name="type" value="Person" onclick="ShowHideDiv()" required>
      <label for="person">Person</label>
      <input type="radio" id="company" name="type" value="Company" onclick="ShowHideDiv()" required>
      <label for="company">Company</label>
      <div id="dvMan">
       <label id="MSA_cont"></label>
      <input type="text" id="checkBox" name="checkBox" required>
      </div><br>
   </p>
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
  
    if(isset($_POST['save'])) 
    {
      $name = $_POST['name'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $brn = $_POST['branchNo'];
      $type = $_POST['type'];
      $checkBox =$_POST['checkBox'];

      $quaery1 = "INSERT INTO `owner` (`owner_ID`, `address`, `name`, `email`, `contact_number`, `branch_no`, `owner_type`) VALUES (NULL, '$address', '$name', '$email', '$phone', '$brn', '$type')";
      mysqli_query($conn,$quaery1);
      $selectQ = "SELECT MAX(owner_ID) FROM owner";
      $result = mysqli_query($conn,$selectQ);
      $row= mysqli_fetch_assoc($result);
      $owner_ID = $row[("MAX(owner_ID)")];
      $check ;

      if($type == "Person")
      {
        $query2 ="INSERT INTO `person` (`NIC`, `owner_ID`) VALUES ('$checkBox', '$owner_ID')";
        $check=mysqli_query($conn,$query2);
      }
      else
      {
        $query2 ="INSERT INTO `company` (`company_ID`, `owner_ID`) VALUES ('$checkBox', '$owner_ID')";
        $check=mysqli_query($conn,$query2);
      }

    if($check)
    {
      echo "New record created successfully.";
    }
    else
    {
      echo "Error:<br>" ,$query1.mysqli_error($conn),"<br>",$query2.mysqli_error($conn);
    }
    mysqli_close($conn);
    }
?>