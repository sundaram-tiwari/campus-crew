<?php
session_start();
include "config/db_connect.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events</title>
    <link rel="stylesheet" href="assets/css/add_events.css">
</head>

<body>
    <?php
    include "includes/admin_sidebar.php";
    ?>

    <main class="main-content">
        <header class="topbar">
            <h1>Add Events</h1>
            <a href="manage_events.php" class="btn-back">&larr; Back to Events</a>
        </header>

        <section class="form-section">
            <form action="add_events.php" method="post" enctype="multipart/form-data" class="event-form">
                <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" name="title" placeholder="Enter event title" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter event description" required></textarea>
                </div>
                <div class="form-group-inline">
                    <div>
                        <label>Date</label>
                        <input type="date" name="event_date" required>
                    </div>
                    <div>
                        <label>Time</label>
                        <input type="time" name="event_time" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" required>
                        <option value="">Select Category</option>
                        <option value="Technical">Technical</option>
                        <option value="Cultural">Cultural</option>
                        <option value="Sports">Sports</option>
                        <option value="Workshop">Workshop</option>
                    </select>
                </div>
                <div class="form-group-inline">
                    <div class="form-group">
                        <label>Target Course</label>
                        <select name="target_course" required>
                            <option value="">Select Target Course</option>
                            <option value="BCA">BCA</option>
                            <option value="BCOM">BCOM</option>
                            <option value="BBA">BBA</option>
                            <option value="Open for All">Open for All</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target Year</label>
                        <select name="target_year" required>
                            <option value="">Select Target Year</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="Open for All">Open for ALl</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Event Image</label>
                    <input type="file" name="image_url" accept="image/*" required>
                </div>

                <div class="form-action">
                    <button type="submit" class="btn-submit">Save Events</button>
                    <button type="reset" class="btn-reset">Clear</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>