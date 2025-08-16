<?php
include "config/db_connect.php";
include "includes/admin_login_check.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $event_id = intval($_GET['id']);
    $sql = "SELECT * FROM events WHERE event_id = '$event_id'";
    $result = mysqli_query($conn, $sql);
    $event = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id       = intval($_POST['event_id']);
    $title          = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $description    = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $category       = mysqli_real_escape_string($conn, $_POST['category']);
    $event_date     = $_POST['event_date'];
    $event_time     = $_POST['event_time'];
    $target_course  = mysqli_real_escape_string($conn, $_POST['target_course']);
    $target_year    = mysqli_real_escape_string($conn, $_POST['target_year']);

    $sql = "SELECT image_url FROM events WHERE event_id = $event_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $old_image = $row['image_url'];

    $imagePath = $old_image; 

    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . "/../uploads/events/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = time() . "_" . basename($_FILES['image_url']['name']);
        $target_file = $uploadDir . $filename;

        $allowed_ext = ["jpg", "jpeg", "png", "gif"];
        $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed_ext)) {
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
                // Delete old image
                if (!empty($old_image) && file_exists(__DIR__ . "/../../" . $old_image)) {
                    unlink(__DIR__ . "/../../" . $old_image);
                }
                $imagePath = "uploads/events/" . $filename;
            }
        }
    }

    $update = "UPDATE events SET 
        title = '$title',
        description = '$description',
        category = '$category',
        event_date = '$event_date',
        event_time = '$event_time',
        target_course = '$target_course',
        target_year = '$target_year',
        image_url = '$imagePath'
        WHERE event_id = $event_id";

    if (mysqli_query($conn, $update)) {
        header("Location: manage_events.php?success=1");
        exit();
    } else {
        echo "<script>alert('Error updating events.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Events</title>
    <link rel="stylesheet" href="assets/css/add_events.css">
</head>

<body>
    <?php
    include "includes/admin_sidebar.php";
    ?>

    <main class="main-content">
        <header class="topbar">
            <h1>Edit Events</h1>
            <a href="manage_events.php" class="btn-back">&larr; Back to Events</a>
        </header>

        <section class="form-section">
            <form action="edit_event.php" method="post" enctype="multipart/form-data" class="event-form">
                <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">

                <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" name="title" value="<?php echo $event['title']; ?>"
                        placeholder="Enter event title" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required><?php echo $event['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" required>
                        <option value="Technical" <?php if($event['category'] == 'Technical') echo 'selected'; ?>>Technical</option>
                        <option value="Cultural" <?php if($event['category'] == 'Cultural') echo 'selected'; ?>>Cultural</option>
                        <option value="Sports" <?php if($event['category'] == 'Sports') echo 'selected'; ?>>Sports</option>
                        <option value="Workshop" <?php if($event['category'] == 'Workshop') echo 'selected'; ?>>Workshop</option>
                    </select>
                </div>
                <div class="form-group-inline">
                    <div>
                        <label>Date</label>
                        <input type="date" name="event_date" value="<?php echo $event['event_date']; ?>" required>
                    </div>
                    <div>
                        <label>Time</label>
                        <input type="time" name="event_time" value="<?php echo $event['event_time']; ?>" required>
                    </div>
                </div>
                <div class="form-group-inline">
                    <div class="form-group">
                        <label>Target Course</label>
                        <select name="target_course" value="<?php echo $event['target_course']; ?>" required>
                            <option value="BCA" <?php if($event['target_course'] == 'BCA') echo 'selected'; ?>>BCA</option>
                            <option value="BCOM" <?php if($event['target_course'] == 'BCOM') echo 'selected'; ?>>BCOM</option>
                            <option value="BBA" <?php if($event['target_course'] == 'BBA') echo 'selected'; ?>>BBA</option>
                            <option value="Open for All" <?php if($event['target_course'] == 'Open for All') echo 'selected'; ?>>Open for All</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target Year</label>
                        <select name="target_year" required>
                            <option value="1st Year" <?php if($event['target_year'] == '1st Year') echo 'selected'; ?>>1st Year</option>
                            <option value="2nd Year" <?php if($event['target_year'] == '2nd Year') echo 'selected'; ?>>2nd Year</option>
                            <option value="3rd Year" <?php if($event['target_year'] == '3rd Year') echo 'selected'; ?>>3rd Year</option>
                            <option value="4th Year" <?php if($event['target_year'] == '4th Year') echo 'selected'; ?>>4th Year</option>
                            <option value="Open for All" <?php if($event['target_year'] == 'Open for All') echo 'selected'; ?>>Open for ALl</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Event Image</label>
                    <input type="file" name="image_url" accept="image/*">
                    <p>Current Image: <?php echo basename($event['image_url']);?></p>
                </div>

                <div class="form-action">
                    <button type="submit" class="btn-submit">Save Changes</button>
                    <button type="reset" class="btn-reset">Clear</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
