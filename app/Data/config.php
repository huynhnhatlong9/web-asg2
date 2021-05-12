<?php
$servername = 'localhost';
$dbusername = 'root';       //modify to use
$dbpassword = 'LocT@2031';  //modify to use
$dbname = "todoapp";        //modify to use

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . '<br>' . 'Go to file /Data/config.php to modify');
}


function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}