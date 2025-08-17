<?php
include '../config/db.php';

if(!isset($_GET['id']) && !is_numeric($_GET['id'])){
    die('Invalid Event Id');
}

$event_id = intval($_GET['id']);
$sql = "SELECT * FROM events WHERE event_id = '$event_id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($result);

if(!$event){
    die("Event not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $event['title']; ?></title>
    <link rel="stylesheet" href="../assets/css/events.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
    <?php include "../includes/navbar.php" ?>

    <div class="event-detail-container">
        <img src="<?php echo "../" . $event['image_url']; ?>" alt="Event Image" class="event-detail-img">

        <h1><?php echo $event['title'];?></h1>
        <div class="wrap-content">
        <p><strong>Date : </strong><?php echo $event['event_date'];?></p>
        <p><strong>Time : </strong><?php echo $event['event_time'];?></p>
        </div>
        <div class="wrap-content2">
            <p><strong>Course : </strong><?php echo $event['target_course'];?></p>
            <p><strong>Year : </strong><?php echo $event['target_year'];?></p>
        </div>
        <p><strong>Category : </strong><?php echo $event['category'];?></p>
        <p><strong>Description : </strong><?php echo $event['description'];?></p>

        <div class="event-action">
            <a href="../events.php" class="btn btn-secondary">⬅ Go Back</a>
            <a href="register_event.php?event_id=<?php echo $event['event_id'];?>" class="btn btn-primary">Register</a>
        </div>
    </div>
</body>
</html>