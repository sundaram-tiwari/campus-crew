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
          <option>1st Year</option>
          <option>2nd Year</option>
          <option>3rd Year</option>
          <option>4th Year</option>
        </select>
        <input type="password" placeholder="Password" name="password" required />
        <input type="password" placeholder="Confirm Password" name="cnfPass" required />
        <button type="submit" method="post">Sign Up</button>
      </form>
      <div class="register-footer">
        <p>Already have an account? <a href="login.php">Log In</a></p>
      </div>
    </div>
  </div>
</body>
</html>

<?php

//INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `course`, `year`, `phone`, `created_at`) VALUES ('1', 'test', 'test@test.com', '123456', 'BCA', '2', '123456789', current_timestamp());
?>