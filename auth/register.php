<?php
session_start();
?>

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
    <img src="../assets/images/logo.png" alt="Campus Crew" class="register-logo">
    <h1>Register</h1>

    <form action="register.php" method="post" class="input-form" enctype="multipart/form-data">
      <div class="field-box">
        <label for="fullName">Full Name</label>
        <input type="text" placeholder="Enter your full name" name="fullName" required />
      </div>

      <div class="field-box">
        <label for="email">Email</label>
        <input type="email" placeholder="Enter your email" name="email" required />
      </div>

      <div class="field-box">
        <label for="phone">Phone</label>
        <input type="tel" placeholder="Enter your 10-digit phone number" name="phone" required />
      </div>
      <div class="single-row">
        <div class="field-box">
          <label for="course">Course</label>
          <select name="course" required>
            <option value="" disabled selected>Select Course</option>
            <option>B.Com</option>
            <option>BCA</option>
            <option>BBA</option>
            <option>BA</option>
            <option>Other</option>
          </select>
        </div>

        <div class="field-box">
          <label for="year">Year</label>
          <select name="year" required>
            <option value="" disabled selected>Select Year</option>
            <option value="1">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
            <option value="4">4th Year</option>
          </select>
        </div>
      </div>
      <!-- <div class="field-box">
        <label for="profile_photo">Profile Photo</label>
        <input type="file" name="profile_photo" accept="image/*" required />
      </div> -->

      <div class="field-box">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" name="password" required />
      </div>

      <div class="field-box">
        <label for="cnfPass">Confirm Password</label>
        <input type="password" placeholder="Confirm password" name="cnfPass" required />
      </div>

      <button type="submit" class="btn-submit">Register</button>
    </form>

    <p class="login-text">Already have an account? <a href="login.php">Login</a></p>
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