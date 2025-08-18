<?php
$base_url = '/campus_crew'; 
// session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
<link rel="stylesheet" href="./assets/css/index.css">
<nav class="nav-container">
    <div class="nav-content">
        <img src="<?= $base_url ?>/assets/images/logo.png" class="logo" alt="CampusCrew" />
        <ul class="nav-list">
            <li><a href="<?= $base_url ?>/index.php">Home</a></li>
            <li><a href="<?= $base_url ?>/events.php">Events</a></li>
            <li><a href="<?= $base_url ?>/about_us.php">About Us</a></li>
            <li><a href="<?= $base_url ?>/contact_us.php">Contact Us</a></li>
        </ul>
    </div>
    <div class="auth-btns">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?= $base_url ?>/auth/user_profile.php">
                My Profile</a> |
            <a href="<?= $base_url ?>/auth/logout.php" class="logout-btn">Log Out</a>
        <?php else: ?>
            <a href="<?= $base_url ?>/auth/login.php" class="auth-btn">Log In</a>
            <a href="<?= $base_url ?>/auth/register.php" class="auth-btn">Register</a>
        <?php endif; ?>
    </div>
</nav>