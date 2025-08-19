<?php
$base_url = '/campus_crew'; 
// session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="./assets/css/index.css">

<nav class="nav-container">
    <div class="nav-content">
        <img src="<?= $base_url ?>/assets/images/logo.png" class="logo" alt="CampusCrew" />

        <!-- Desktop Menu -->
        <ul class="nav-list desktop-menu">
            <li><a href="<?= $base_url ?>/index.php">Home</a></li>
            <li><a href="<?= $base_url ?>/events.php">Events</a></li>
            <li><a href="<?= $base_url ?>/about_us.php">About Us</a></li>
            <li><a href="<?= $base_url ?>/contact_us.php">Contact Us</a></li>
        </ul>
    </div>

    <!-- Desktop Auth Buttons -->
    <div class="auth-btns desktop-auth">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?= $base_url ?>/auth/user_profile.php">My Profile</a> |
            <a href="<?= $base_url ?>/auth/logout.php" class="logout-btn">Log Out</a>
        <?php else: ?>
            <a href="<?= $base_url ?>/auth/login.php" class="auth-btn">Log In</a>
            <a href="<?= $base_url ?>/auth/register.php" class="auth-btn">Register</a>
        <?php endif; ?>
    </div>

    <!-- Hamburger Icon -->
        <button class="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
</nav>

<!-- Right Side Drawer Menu -->
<div class="side-menu" id="sideMenu">
    <button class="close-btn"><i class="fas fa-times"></i></button>
    <ul>
        <li><a href="<?= $base_url ?>/index.php">Home</a></li>
        <li><a href="<?= $base_url ?>/events.php">Events</a></li>
        <li><a href="<?= $base_url ?>/about_us.php">About Us</a></li>
        <li><a href="<?= $base_url ?>/contact_us.php">Contact Us</a></li>
        <hr>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="<?= $base_url ?>/auth/user_profile.php">My Profile</a></li>
            <li><a href="<?= $base_url ?>/auth/logout.php" class="logout-btn">Log Out</a></li>
        <?php else: ?>
            <li><a href="<?= $base_url ?>/auth/login.php">Log In</a></li>
            <li><a href="<?= $base_url ?>/auth/register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</div>

<script>
    const toggle = document.querySelector('.menu-toggle');
    const sideMenu = document.getElementById('sideMenu');
    const closeBtn = document.querySelector('.close-btn');

    toggle.addEventListener('click', () => {
        sideMenu.classList.add('active');
    });

    closeBtn.addEventListener('click', () => {
        sideMenu.classList.remove('active');
    });
</script>