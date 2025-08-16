<?php
include 'config/db_connect.php';
include 'includes/admin_login_check.php';
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
                    <div>
                        <label>Date</label>
                        <input type="date" name="event_date" required>
                    </div>
                    <div>
                        <label>Time</label>
                        <input type="time" name="event_time" required>
                    </div>
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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $category = trim(mysqli_real_escape_string($conn, $_POST['category']));
    $event_date = trim(mysqli_real_escape_string($conn, $_POST['event_date']));
    $event_time = trim(mysqli_real_escape_string($conn, $_POST['event_time']));
    $target_course = trim(mysqli_real_escape_string($conn, $_POST['target_course']));
    $target_year = trim(mysqli_real_escape_string($conn, $_POST['target_year']));

    if(empty($title) || empty($description) || empty($category) || empty($event_date) || empty($event_time) || empty($target_course) || empty($target_year)){
        die("Please Provide all fields.");
    }

    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        $target_dir = __DIR__ . "/../uploads/events/";
        if(!is_dir($target_dir)){
            mkdir($target_dir,0777,true);
        }
        
        $filename = basename($_FILES['image_url']['name']);
        $file_tmp = $_FILES['image_url']['tmp_name'];
        $file_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

        $allowed_ext = ["jpg","jpeg","png","gif"];
        if(!in_array($file_ext,$allowed_ext)){
            die("<script>alert('Inavlid image formate. Only jpg, jpeg, png and gif are allowed.')</script>");
        }

        $new_file_name = time() . "_" . preg_replace("/[^a-zA-Z0_9._-]/", "_", $filename);
        $target_file = $target_dir . $new_file_name;

        if(move_uploaded_file($file_tmp, $target_file)){
             $image_url = "uploads/events/" . $new_file_name;

            $sql = "INSERT INTO events (title, description, category, event_date, event_time, target_course, target_year, image_url, created_at)
                    VALUES ('$title','$description','$category','$event_date','$event_time','$target_course','$target_year','$image_url',NOW())";

            if(mysqli_query($conn, $sql)){
                echo "<script>window.location.href='manage_events.php'</script>";
            } else {
                echo "<script>alert('Database error : " .mysqli_error($conn) ."');</script>";
            }
        } else {
            echo "<script>alert('Error uploading image.')</script>";
        }
    } else {
        echo "<script>alert('Please upload an event image.')</script>";
    }
}
?>