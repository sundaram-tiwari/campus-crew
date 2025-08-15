<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/admin_login.css">
</head>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="admin_login.php" method="post">
            <div class="field-box">
                <label for="email">Email</label>
                <input type="text" placeholder="Enter your email" name="email">
            </div>
            <div class="field-box">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter 6 digit password" name="password">
            </div>
            <div class="field-box">
                <button type="submit" class="btn-submit">Login</button>
            </div>
        </form>
        <a href="" class="forget-pass">Forget Password ?</a>
    </div>
</body>
</html>

<?php 
session_start();
include('config/db_connect.php');

if(isset($_SESSION['admin_id'])){
    header("Location: admin_dashboard.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim($_POST['password']);

    if(empty($email)){
        die("Please provide email");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('Invalid Email');
    }

    if(empty($password)){
        die('Please provide password');
    }

    $sql = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $admin = mysqli_fetch_assoc($result);

        if($password === $admin['password']){ 
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['name'] = $admin['name'];

            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('Admin not found.');</script>";
    }
}
?>
