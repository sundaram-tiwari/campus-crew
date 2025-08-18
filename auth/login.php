
<?php   
session_start();

include("../config/db.php");

$base_url = '/campus_crew';

if(isset($_SESSION['user_id'])){
    header("Location: $base_url/index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim(mysqli_real_escape_string($conn, $_POST["email"]));
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)){
        die('Please provide all fields');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('Invalid email');
    }

    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $users = mysqli_fetch_assoc($result);

        if(password_verify($password, $users["password"])){
            $_SESSION["user_id"] = $users["id"];
            $_SESSION["fullName"] = $users["fullName"];
            $_SESSION["email"] = $users["email"];
            $_SESSION['alert_message'] = "Login Successful.";
            
            if(isset($_SESSION['alert_message']) && !empty($_SESSION['alert_message'])){
                unset($_SESSION['alert_message']);
                header("Location: $base_url/events.php"); 
                exit();
            }

            include '../includes/show_alert.php'; 
            header("Location: $base_url/index.php");
            exit();
        } else{
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User Not Found.');</script>";
    }
}
    
?>

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
                <input type="email" class="input-box" name="email" placeholder="Email" required />
                <input type="password" class="input-box" name="password" placeholder="Password" required />
                <button type="submit">Login</button>
            </form>
            <div class="login-footer">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
</body>

</html>