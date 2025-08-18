<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Campus Crew - Events</title>
  <link rel="stylesheet" href="assets/css/events.css"/>
</head>
<body>

<?php
session_start();
    include 'includes/navbar.php';
?>
  <div class="events-container">

    <h1 class="page-title">Browse Events</h1>

    <div class="filters">
      <select id="courseFilter">
        <option name="target_course" value="all">All Events</option>
        <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
        <option value="BCOM">BCOM</option>
        <option value="Open for All">Open for All</option>
      </select>

      <input type="date" id="dateFilter" />

      <input type="text" id="searchFilter" placeholder="Search by title or category" />
    </div>

    <div class="events-grid" id="eventsGrid">
  
    </div>
  </div>

<script src="assets/js/eventHandler.js"></script>
</body>
</html>
