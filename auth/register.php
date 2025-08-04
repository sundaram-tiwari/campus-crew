  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Campus Crew - Register</title>
  <link rel="stylesheet" href="../assets/css/register.css" />
</head>

<body>
  <div class="register-container">
    <div class="register-box">
      <img src="../assets/images/logo.png" class="register-logo" alt="Campus Crew" />
      <h2>Register</h2>
      <form action="register.php" method="post">
        <input type="text" placeholder="Full Name" name="fullName" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="tel" placeholder="Phone" name="phone" required />
        <select name="course" required>
          <option value="" disabled selected>Select Course</option>
          <option>B.Com</option>
          <option>BCA</option>
          <option>BBA</option>
          <option>BA</option>
          <option>Other</option>
        </select>
        <select name="year" required>
          <option value="" disabled selected>Select Year</option>
          <option value="1">1st Year</option>
          <option value="2">2nd Year</option>
          <option value="3">3rd Year</option>
          <option value="4">4th Year</option>
        </select>
        <input type="password" placeholder="Password" name="password" required />
        <input type="password" placeholder="Confirm Password" name="cnfPass" required />
        <button type="submit">Sign Up</button>
      </form>
      <div class="register-footer">
        <p>Already have an account? <a href="login.php">Log In</a></p>
      </div>
    </div>
  </div>
</body>
</html>

<?php
include("../config/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $full_name = trim(mysqli_real_escape_string($conn, $_POST['fullName']));
  $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
  $phone = trim(mysqli_real_escape_string($conn, $_POST['phone']));
  $course = trim(mysqli_real_escape_string($conn,  $_POST['course']));
  $year = trim(mysqli_real_escape_string($conn, $_POST['year']));
  $password = trim($_POST['password']);
  $cnfPass = trim($_POST['cnfPass']);

  if(empty($full_name) || empty($email) || empty($phone) || empty($course) || empty($year) || empty($password) || empty($cnfPass)){
    die('All fields are required.');
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die('Invalid Email.');
  }

  if(!preg_match("/^[0-9]{10}$/", $phone)){
    die("Invalid phone number.");
  }

  if($password != $cnfPass){
    die("Password do not match.");
  }

  //Password hasing
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  //Email checking
  $checkQuery = "SELECT * FROM users WHERE email = '$email'";
  $checkResult = mysqli_query($conn, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    die("Email already registered. Please log in.");
  }

  $insertQuery = "INSERT INTO users (full_name, email, password, course, year, phone, created_at)
                    VALUES ('$full_name', '$email', '$hashedPassword', '$course', '$year', '$phone', CURRENT_TIMESTAMP)";

  if(mysqli_query($conn, $insertQuery)){
    header("Location: login.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  mysqli_close($conn);
} 

?>