<?php
$servername = "172.18.0.3";
$dbusername = "root";       //modify to use
$dbpassword = "13152989Ln@";  //modify to use
$dbname = "web-asg02";        //modify to use

$conn = new mysqli($servername, $dbusername, $dbpassword);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . '<br>' . 'Go to file /Data/config.php to modify');
}
// try {
//     $conn = new PDO("mysql:host=$servername;port=9001;dbname=web-asg01", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
//   } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//   }


function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}