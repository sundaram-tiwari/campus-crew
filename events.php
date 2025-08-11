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
    include 'includes/navbar.php';
?>
  <div class="events-container">

    <h1 class="page-title">Browse Events</h1>

    <div class="filters">
      <select id="categoryFilter">
        <option value="all">All Categories</option>
        <option value="tech">Tech</option>
        <option value="cultural">Cultural</option>
        <option value="sports">Sports</option>
      </select>

      <input type="date" id="dateFilter" />

      <input type="text" id="searchFilter" placeholder="Search by title..." />
    </div>

    <!-- Events Grid -->
    <div class="events-grid" id="eventsGrid">
  
    </div>
  </div>

<script src="assets/js/eventHandler.js"></script>
</body>
</html>
