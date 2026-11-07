<?php
$host = "localhost";
$dbname ="session_auth_db";
$username = "root";
$password = "";

$conn = new mysqli("localhost", "root", "", "session_auth_db");

if ($conn->connect_error) {
die("Database connection failed: " . $conn->connect_error);
}

session_start();
?>