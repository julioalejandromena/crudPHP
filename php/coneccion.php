<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbnombre = "userdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbnombre);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully ";
