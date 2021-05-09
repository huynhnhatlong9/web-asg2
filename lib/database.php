<?php
include __DIR__."/../config.php";
?>

<?php
// Create connection

$con = mysqli_connect(HOST, USER, PASS,DB_NAME);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
