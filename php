<?php
$username = "BSIT BA 3104";
$user_id = 153422;
$age = 20;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Demo</title>
</head>
<body>
    <h1>
     <label>Username:</label>
     <br>
     <?php echo $username;?>
     <br>
     <label>User ID:</label>
     <br>
     <?php echo $user_id;?>
     <br>
     <label>Age:</label>
     <br>
     <?php echo $age;?>
</h1>
    
<button type="button" onclick="greetUser('<?php echo $username; ?>')">Greet User</button>

<script>
    let username ="<?php echo $username; ?>";
    let userID ="<?php echo $user_id; ?>";
    let age ="<?php echo $age; ?>";
    function greetUser(){
        alert("Hello" + username + "!" + "your user id is: " + World);
    }
</script>
</body>
</html>
