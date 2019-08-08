 <?php
$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$db="eis";

// Create connection
$conn = mysqli_connect($servername, $dbuser, $dbpassword,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "ready to go";
?> 