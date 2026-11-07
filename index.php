<?php
session_start(); 
require "db.php";

$message = "";

if (isset($_POST["login"])) {
$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();


if ($user && password_verify($password, $user["password_hash"])) {

$_SESSION["old_id"] = session_id(); 

session_regenerate_id(true);
$_SESSION["user_id"] = $user["id"];
$_SESSION["username"] = $username;

header("Location: dashboard.php");
exit;
} else {
$message = "Wrong username or password.";
}
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h1>Login</h1>

<form method="post">
Username: <input type="text" name="username" required><br><br>
Password: <input type="password" name="password" required><br><br>
<button type="submit" name="login">Login</button>
</form>

<p><?php echo $message; ?></p>
<a href="register.php">Create an account</a>
</body>
</html>