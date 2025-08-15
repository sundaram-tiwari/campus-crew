<?php
session_start();
include "config/db_connect.php";

 $sql = "SELECT * FROM events";
  $result = mysqli_query($conn, $sql);

  $events = mysqli_fetch_all($result);
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
        <span><?php echo "Welcome, " . $_SESSION['name'];?></span>
        <img src="assets/images/admin-avtar.png" alt="Admin" class="avatar">
      </div>
    </header>

    <section class="dashboard-cards">
      <div class="card">
        <i class="fas fa-calendar-alt"></i>
        <h3><?php echo mysqli_num_rows($result); ?></h3>
        <p>Upcoming Events</p>
      </div>
      <div class="card">
        <i class="fas fa-users"></i>
        <h3>320</h3>
        <p>Registered Users</p>
      </div>
      <div class="card">
        <i class="fas fa-clipboard-list"></i>
        <h3>540</h3>
        <p>Total Registrations</p>
      </div>
    </section>

    <section class="content-section">
      <h2>Recent Registrations</h2>
      <table>
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Participant</th>
            <th>Email</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tech Fest</td>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>12 Aug 2025</td>
          </tr>
          <tr>
            <td>Sports Day</td>
            <td>Jane Smith</td>
            <td>jane@example.com</td>
            <td>11 Aug 2025</td>
          </tr>
        </tbody>
      </table>
    </section>

  </main>
</body>

</html>

<?php

  if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
  }

?>