<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us - Campus Crew</title>
  <link rel="stylesheet" href="assets/css/about_us.css" />
</head>
<body>

    <?php 
    session_start();
    include 'includes/navbar.php' 
    ?>
  <header class="header">
    <h1>About Campus Crew</h1>
    <p>Your one-stop platform for managing and experiencing college events.</p>
  </header>

  <section class="mission">
    <h2>Our Mission</h2>
    <p>
      Campus Crew aims to simplify the organization, participation, and tracking of college events. 
      We provide students and organizers with an easy-to-use platform to make event management more effective and engaging.
    </p>
  </section>

  <section class="features">
    <h2>What We Offer</h2>
    <ul>
      <li>📅 Event Listings & Details</li>
      <li>📝 Easy Online Registration</li>
      <li>🖼️ Event Posters and Media</li>
      <li>🔔 Notification & Reminders</li>
      <li>📊 Event Tracking for Organizers</li>
    </ul>
  </section>

  <section class="team">
    <h2>Meet the Team</h2>
    <div class="team-container">
      <div class="member">
        <img src="./assets/images/person1.webp" alt="Team Member 1">
        <h3>Sundaram Tiwari</h3>
        <p>Lead Developer & Designer</p>
      </div>
      <div class="member">
        <img src="./assets/images/person2.webp" alt="Team Member 2">
        <h3>Krishna Tiwari</h3>
        <p>UI/UX Designer</p>
      </div>
      <div class="member">
        <img src="./assets/images/person.avif" alt="Team Member 3">
        <h3>Raj Verma</h3>
        <p>Firebase & Backend Developer</p>
      </div>
    </div>
  </section>

  <footer class="footer">
    <p>&copy; 2025 Campus Crew. All rights reserved.</p>
  </footer>

</body>
</html>
