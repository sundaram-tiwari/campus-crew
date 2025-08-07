<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Campus Crew - Events</title>
  <link rel="stylesheet" href="../assets/css/events.css"/>
  <link rel="stylesheet" href="../assets/css/index.css"/>
</head>
<body>

<?php
    include '../includes/navbar.php';
?>
  <div class="events-container">

    <h1 class="page-title">Browse Events</h1>

    <div class="filters">
      <select id="categoryFilter">
        <option value="all">All Categories</option>
        <option value="tech">Technical</option>
        <option value="cultural">Cultural</option>
        <option value="sports">Sports</option>
      </select>

      <input type="date" id="dateFilter" />

      <input type="text" id="searchFilter" placeholder="Search by title..." />
    </div>

    <!-- Events Grid -->
    <div class="events-grid" id="eventsGrid">
      <!-- Example Event Card -->
      <div class="event-card" data-category="tech">
        <img src="../assets/images/event1.jpg" alt="Event Image">
        <div class="event-info">
          <h3>Hackathon 2025</h3>
          <p>August 20, 2025</p>
          <p class="category">Technical</p>
        </div>
      </div>

      <div class="event-card" data-category="cultural">
        <img src="../assets/images/event2.jpg" alt="Event Image">
        <div class="event-info">
          <h3>Dance Night</h3>
          <p>August 22, 2025</p>
          <p class="category">Cultural</p>
        </div>
      </div>

      <!-- Add more cards as needed -->
    </div>
  </div>

  <script>
    const categoryFilter = document.getElementById("categoryFilter");
    const searchFilter = document.getElementById("searchFilter");
    const eventsGrid = document.getElementById("eventsGrid");

    categoryFilter.addEventListener("change", filterEvents);
    searchFilter.addEventListener("input", filterEvents);

    function filterEvents() {
      const categoryValue = categoryFilter.value.toLowerCase();
      const searchText = searchFilter.value.toLowerCase();

      document.querySelectorAll(".event-card").forEach(card => {
        const cardCategory = card.dataset.category.toLowerCase();
        const cardTitle = card.querySelector("h3").innerText.toLowerCase();

        const matchCategory = categoryValue === "all" || cardCategory === categoryValue;
        const matchSearch = cardTitle.includes(searchText);

        if (matchCategory && matchSearch) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    }
  </script>
</body>
</html>
