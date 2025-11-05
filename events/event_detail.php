<?php
include '../config/db.php';
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid Event Id');
}

$event_id = intval($_GET['id']);
$sql = "SELECT * FROM events WHERE event_id = $event_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($result);

if (!$event) {
    die("Event not found.");
}

$is_registered = false;
$reg_id = null;

// Check if user is logged in and already registered
if (isset($_SESSION['user_id'])) {
    $user_id = (int) $_SESSION['user_id'];
    $sql = "SELECT er.reg_id 
            FROM event_registration er 
            WHERE er.user_id = $user_id AND er.event_id = $event_id 
            LIMIT 1";
    $check_result = mysqli_query($conn, $sql);
    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $is_registered = true;
        $reg_id = $row['reg_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($event['title']); ?></title>
    <link rel="stylesheet" href="../assets/css/events.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <?php include "../includes/navbar.php"; ?>

    <div class="event-detail-container">
        <img src="<?php echo "../" . htmlspecialchars($event['image_url']); ?>" alt="Event Image"
            class="event-detail-img">

        <h1><?php echo htmlspecialchars($event['title']); ?></h1>
        <div class="wrap-content">
            <p><strong>Date : </strong><?php echo htmlspecialchars($event['event_date']); ?></p>
            <p><strong>Time : </strong><?php echo htmlspecialchars($event['event_time']); ?></p>
        </div>
        <div class="wrap-content2">
            <p><strong>Course : </strong><?php echo htmlspecialchars($event['target_course']); ?></p>
            <p><strong>Year : </strong><?php echo htmlspecialchars($event['target_year']); ?></p>
        </div>
        <p><strong>Category : </strong><?php echo htmlspecialchars($event['category']); ?></p>
        <p><strong>Description : </strong><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>

        <div class="event-action">

            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="../events.php" class="btn btn-secondary">⬅ Go Back</a>
                <a href="../auth/login.php" class="btn btn-primary">Login to Register</a>
            <?php else: ?>
                <?php if ($is_registered): ?>
                    <p class="registered-msg">You are already registered for this event.</p>
                    <form method="post" action="../events/unregister_event.php"
                        onsubmit="return confirm('Cancel your registration?');">
                        <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>">
                        <button type="submit" class="btn btn-danger">Cancel Registration</button>
                        <a href="../events.php" class="btn btn-secondary">⬅ Go Back</a>
                    </form>
                <?php else: ?>
                    <a href="register_event.php?event_id=<?php echo $event['event_id']; ?>" class="btn btn-primary">Register</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>