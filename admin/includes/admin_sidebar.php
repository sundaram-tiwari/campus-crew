<link rel="stylesheet" href="assets/css/admin_panel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="assets/images/logo-white.png" alt="Campus Crew" class="logo">
        <h2>Admin Panel</h2>
    </div>
    <ul class="sidebar-menu">
        <li class="<?php if(isset($page_id) && $page_id == 'dashboard') echo 'sidebar-active';?>"><a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="<?php if(isset($page_id) && $page_id == 'events') echo 'sidebar-active';?>"><a href="manage_events.php"><i class="fas fa-calendar-alt"></i> Manage Events</a></li>
        <li class="<?php if(isset($page_id) && $page_id == 'users') echo 'sidebar-active';?>"><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
        <li class="<?php if(isset($page_id) && $page_id == 'registrations') echo 'sidebar-active';?>"><a href="registrations.php"><i class="fas fa-clipboard-list"></i> Registrations</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</aside>
