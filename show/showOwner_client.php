<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if (!isset($_SESSION["UserRoll"])) 
{
    header("location:header.php");
}
if ($_SESSION["UserRoll"] != "client") 
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

<a href="../client.php">Go Back<br><br><br></a>

<?php
echo "<table style='border: solid 1px black;'>";
 echo"<tr><th>Owner ID</th><th>Address</th><th>Name</th><th>Email</th><th>Contact Number</th><th>Branch No</th><th>Owner Type</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "client";
$password = "client";
$dbname = "sewana";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT owner_ID, address, name, email, contact_number, branch_no, owner_type FROM Owner");
    $stmt->execute();
 
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

</body>
</html>