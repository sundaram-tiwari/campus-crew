<?php
include "config/db_connect.php";
include "includes/admin_login_check.php";

$sql = "SELECT * FROM events";
$total_events = mysqli_query($conn, $sql);

$sql = "SELECT * 
  FROM events
  WHERE event_date > CURDATE()
  ORDER BY event_date DESC;";
$upcoming_event = mysqli_query($conn, $sql);

$sql = "SELECT * FROM events WHERE event_date = CURDATE();";
$active_event = mysqli_query($conn, $sql);

$sql = "SELECT * 
  FROM events
  WHERE event_date < CURDATE()
  ORDER BY event_date DESC;";
$expired_event = mysqli_query($conn, $sql);

$sql = "SELECT * FROM users";
$user_result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($user_result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/admin_panel.css">
</head>

<body>
  <?php $page_id = "dashboard"; ?>
  <?php include 'includes/admin_sidebar.php'; ?>

  <main class="main-content">
    <header class="topbar">
      <h1>Dashboard</h1>
      <div class="admin-info">
        <span><?php echo "Welcome, " . $_SESSION['name']; ?></span>
        <img src="assets/images/admin-avtar.png" alt="Admin" class="avatar">
      </div>
    </header>

    <section class="dashboard-cards">
      <div class="card">
        <i class="fas fa-calendar-alt"></i>
        <h3><?php echo mysqli_num_rows($upcoming_event); ?></h3>
        <p>Upcoming Events</p>
      </div>
      <div class="card">
        <i class="fa-solid fa-calendar-day"></i>
        <h3><?php echo mysqli_num_rows($active_event); ?></h3>
        <p>Active Events</p>
      </div>
      <div class="card">
        <i class="fa-solid fa-square-check"></i>
        <h3><?php echo mysqli_num_rows($expired_event); ?></h3>
        <p>Expired Events</p>
      </div>
    </section>
    <section class="dashboard-cards">
      <div class="card">
        <i class="fas fa-users"></i>
        <h3><?php echo mysqli_num_rows($user_result); ?></h3>
        <p>Total Users</p>
      </div>
      <div class="card">
        <i class="fas fa-users"></i>
        <h3><?php echo mysqli_num_rows($total_events); ?></h3>
        <p>Total Events</p>
      </div>
    </section>
  </main>
</body>

</html>