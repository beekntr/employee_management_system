<?php
$servername = "srv1497.hstgr.io";
$username = "u188323907_lucifer"; 
$password = "Luciferwasinnocent@88"; 
$dbname = "u188323907_employe_manage";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
