<?php
session_start();
include "../config/db.php";

$base_url = "campus_crew";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['alert_message']) && !empty($_SESSION['alert_message'])) {
    include '../includes/show_alert.php';
    unset($_SESSION['alert_message']);
}

$user_id = $_SESSION["user_id"];

// Fetch user details
$user_sql = "SELECT * FROM users WHERE id = $user_id";
$user_result = mysqli_query($conn, $user_sql);
$user = mysqli_fetch_assoc($user_result);

// Fetch registered events
$event_sql = "SELECT er.reg_id AS reg_id, e.title, e.image_url, e.event_date, e.event_time, e.category, er.registered_at
              FROM event_registration er
              JOIN events e ON er.event_id = e.event_id
              WHERE er.user_id = $user_id
              ORDER BY er.registered_at DESC";
$event_reg_result = mysqli_query($conn, $event_sql);
if (!$event_reg_result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/user_profile.css">
</head>

<body>
    <div class="main-container">
        <!-- Profile Section -->
        <div class="profile-container">
            <h1>Your Profile</h1>
            <h2>Hello <?php echo htmlspecialchars($user['full_name']); ?></h2>
            <form method="post" id="profileForm" action="update_profile.php">
                <label>Full Name</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>"
                    disabled>

                <label>Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>

                <label>Mobile:</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" disabled>

                <label>Course:</label>
                <input type="text" name="course" value="<?php echo htmlspecialchars($user['course']); ?>" disabled>

                <label>Year</label>
                <select name="year" disabled>
                    <option value="1" <?php if ($user['year'] == 1)
                        echo "selected"; ?>>1st Year</option>
                    <option value="2" <?php if ($user['year'] == 2)
                        echo "selected"; ?>>2nd Year</option>
                    <option value="3" <?php if ($user['year'] == 3)
                        echo "selected"; ?>>3rd Year</option>
                    <option value="4" <?php if ($user['year'] == 4)
                        echo "selected"; ?>>4th Year</option>
                </select>

                <div class="btn-group">
                    <button type="button" class="update-btn" id="editBtn">Edit</button>
                    <button type="submit" class="update-btn" id="saveBtn" style="display:none;">Save</button>
                    <button type="button" class="cancel-btn" id="cancelBtn" style="display:none;">Cancel</button>
                </div>
            </form>
        </div>

        <!-- Registered Events Section -->
        <div class="registered-events">
            <div class="header-flex">
                <h2>Your Registered Events</h2>
                <a href="../events.php" class="back-btn">← Explore Events</a>
            </div>
            <div class="events-grid">
                <?php
                if (mysqli_num_rows($event_reg_result) > 0) {
                    while ($row = mysqli_fetch_assoc($event_reg_result)) {
                        ?>
                        <div class="event-card">
                            <div class="event-details">
                                <?php $image = "../" . $row['image_url'] ?>
                                <img src="<?php echo $image ?>" />
                                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                                <p><strong>Date:</strong> <?php echo htmlspecialchars($row['event_date']); ?></p>
                                <p><strong>Time:</strong> <?php echo htmlspecialchars($row['event_time']); ?></p>
                                <p><strong>Category:</strong> <?php echo htmlspecialchars($row['category']); ?></p>
                                <p class="registered-at">
                                    Registered on: <?php echo htmlspecialchars($row['registered_at']); ?>
                                </p>
                            </div>
                            <form method="post" action="../events/unregister_event.php"
                                onsubmit="return confirm('Are you sure you want to cancel this registration?');">
                                <input type="hidden" name="reg_id" value="<?php echo $row['reg_id']; ?>">
                                <button type="submit" class="cancel-btn">Cancel Registration</button>
                            </form>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No events registered yet.</p>";
                }
                ?>

            </div>
        </div>

    </div>
    <script src="../assets/js/user_profile.js"></script>
</body>

</html>