<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
header("Location: index.php");
exit();
}

$username = htmlspecialchars($_SESSION["username"]);
$email = htmlspecialchars($_SESSION["email"]);
$user_id = htmlspecialchars((string)$_SESSION["user_id"]);
$session_id = htmlspecialchars(session_id());
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - SessionAuthSystem</title>

<style>
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
font-family: Arial, Helvetica, sans-serif;
background-color: #ffffff;
color: #333;
}

/* Navigation Bar */
.navbar {
background-color: #212529;
color: white;
padding: 15px 5%;
display: flex;
justify-content: space-between;
align-items: center;
}

.brand {
font-size: 17px;
font-weight: bold;
color: white;
text-decoration: none;
}

.nav-links {
display: flex;
align-items: center;
gap: 20px;
}

.nav-links a {
text-decoration: none;
color: #ddd;
font-size: 14px;
}

.nav-links .logout {
background-color: #dc3545;
color: white;
padding: 8px 13px;
border-radius: 4px;
}

.nav-links .logout:hover {
background-color: #bb2d3b;
}

/* Main Content */
.container {
width: 90%;
max-width: 1140px;
margin: 75px auto 30px;
}

.welcome h1 {
font-size: 32px;
color: #0d6efd;
margin-bottom: 10px;
}

.welcome p {
color: #777;
font-size: 15px;
margin-bottom: 20px;
}

.explore-btn {
display: inline-block;
background-color: #0d6efd;
color: white;
text-decoration: none;
padding: 11px 17px;
border-radius: 5px;
font-size: 14px;
margin-bottom: 35px;
}

.explore-btn:hover {
background-color: #0b5ed7;
}

hr {
border: 0;
border-top: 1px solid #ddd;
margin-bottom: 30px;
}

/* Information Sections */
.dashboard-info {
display: grid;
grid-template-columns: repeat(3, 1fr);
gap: 25px;
}

.info-box {
padding: 15px 5px;
}

.info-box h3 {
font-size: 17px;
margin-bottom: 12px;
}

.account h3 {
color: #198754;
}

.user h3 {
color: #0dcaf0;
}

.session h3 {
color: #d6b63b;
}

.info-box p {
font-size: 13px;
color: #555;
margin-bottom: 8px;
line-height: 1.6;
}

.status {
color: #198754;
font-weight: bold;
}

.session-value {
color: #dc3545;
font-size: 12px;
overflow-wrap: anywhere;
}

/* Footer */
footer {
text-align: right;
color: #888;
font-size: 12px;
margin-top: 40px;
padding: 15px 0;
}

/* Responsive Design */
@media (max-width: 768px) {
.dashboard-info {
grid-template-columns: 1fr;
gap: 10px;
}

.container {
margin-top: 40px;
}

.welcome h1 {
font-size: 25px;
}

.navbar {
padding: 15px 4%;
}

.nav-links {
gap: 10px;
}
}
</style>
</head>

<body>

<!-- Navigation Bar -->
<nav class="navbar">

<a href="dashboard.php" class="brand">
SessionAuthSystem
</a>

<div class="nav-links">

<a href="dashboard.php">Dashboard</a>

<a href="dashboard.php">
👤 <?= $username ?>
</a>

<a href="logout.php" class="logout">
Logout
</a>

</div>

</nav>


<!-- Dashboard Content -->
<div class="container">

<div class="welcome">

<h1>
Welcome, <?= $username ?>!
</h1>

<p>
This page is protected and only visible to logged-in users.
</p>

<a href="#dashboard-details" class="explore-btn">
Explore Dashboard
</a>

</div>

<hr>


<!-- Dashboard Information -->
<div class="dashboard-info" id="dashboard