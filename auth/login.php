<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Campus Crew - Login</title>
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <img src="../assets/images/logo.png" class="login-logo" alt="Campus Crew" />
            <h2>Welcome Back!</h2>
            <p>Login to continue exploring campus events</p>
            <form action="login.php" method="post">
                <input type="email" class="input-box" placeholder="Email" required />
                <input type="password" class="input-box" placeholder="Password" required />
                <button type="submit">Login</button>
            </form>
            <div class="login-footer">
                <p>Don't have an account? <a href="register.php">Sign up</a></p>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include("../config/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim(mysqli_real_escape_string($conn, $_POST("email")));
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)){
        die('Please provdie all fields');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('Invalid email');
    }
}
    
?>