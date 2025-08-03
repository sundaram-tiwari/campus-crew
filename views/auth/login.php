<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - CampusCrew</title>

  <!-- ✅ Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #F5F5F5;
      color: #212121;
    }
    .btn-primary {
      background-color: #3F51B5;
      border: none;
    }
    .btn-primary:hover {
      background-color: #00BFA5;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark" style="background-color: #3F51B5;">
    <div class="container">
      <a class="navbar-brand" href="#">CampusCrew</a>
    </div>
  </nav>

  <!-- Login Form -->
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
      <h4 class="mb-3 text-center">Login to Your Account</h4>
      <form action="../../controllers/authController.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="text-center mt-3">
          <a href="register.php" class="text-secondary">Don't have an account? Sign up</a>
        </div>
      </form>
    </div>
  </div>

  <!-- ✅ Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
