<?php
include 'db.php';

$message = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    $message = "Account created successfully!";
    } else {
    $message = "Username already exists!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css&quot; rel="stylesheet">

<style>
body {
background-color: #fafcff;
}


.register-box {
width: 380px;
margin: 100px auto;
padding: 30px;
background: white;
border-radius: 10px;
}

.btn-register {
background-color: #16b85b;
color: white;
justify-content: center;
text-align: center;
}

.btn-register:hover {
background-color: #119447;
color: white;
}
</style>
</head>

<body>

<div class="register-box">

<h3 class="text-center mb-2">Create Account</h3>
<p class="text-center text-muted">Sign up to get started</p>

<p class="text-success text-center">
<?php echo $message; ?>
</p>

<form method="POST">

<label class="mb-2">Username</label>
<input type="text" name="username"
class="form-control mb-3"
placeholder="Enter username" required>
<br><br>

<label class="mb-2">Email Address</label>
<input type="email" name="email"
class="form-control mb-3"
placeholder="Enter email address" required>
<br><br>

<label class="mb-2">Password</label>
<input type="password" name="password"
class="form-control mb-4"
placeholder="Create a password" required>
<br><br>

<button type="submit" name="register" class="btn btn-register w-100">Sign Up</button>

</form>

<p class="text-center mt-3">
Already have an account?
<a href="index.php">Login here</a>
</p>

</div>

</body>
</html>