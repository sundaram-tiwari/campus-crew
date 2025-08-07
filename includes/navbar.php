!<!-- navbar.php -->

<?php
$base_url = '/campus_crew';
?>
<nav class="nav-container">
    <div class="nav-content">
        <img src="<?= $base_url ?>/assets/images/logo.png" class="logo" alt="CampusCrew" />
        <ul class="nav-list">
            <li><a href="<?= $base_url ?>/index.php">Home</a></li>
            <li><a href="<?= $base_url ?>/public/events.php">Events</a></li>
            <li><a href="<?= $base_url ?>/public/about_us.php">About Us</a></li>
            <li><a href="<?= $base_url ?>/public/contact_us.php">Contact Us</a></li>
        </ul>
    </div>
    <div class="auth-btn">
        <a href="auth/login.php" class="login-btn">Log In</a>
        <a href="auth/register.php" class="signup-btn">Sign Up</a>
    </div>
</nav>
