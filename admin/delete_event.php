<?php 
include 'config/db_connect.php';
include 'includes/admin_login_check.php';

if(!defined('UPLOAD_PATH')) {
    define('UPLOAD_PATH',__DIR__ . '/../uploads/events/'); 
}

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $event_id = intval($_GET['id']);

    $sql_img = "SELECT image_url FROM events WHERE event_id = '$event_id'";
    $result = mysqli_query($conn, $sql_img);
    $row = mysqli_fetch_assoc($result);

    $sql_delete = "DELETE FROM events WHERE event_id = '$event_id'";
    if(mysqli_query($conn, $sql_delete)){
        
        if(!empty($row['image_url'])){
            $file_path = UPLOAD_PATH . basename($row['image_url']);
            if(file_exists($file_path)){
                unlink($file_path);
            }
        }

        header("Location: manage_events.php");
        exit();
    } else {
        echo "<script>alert('Error in deleting event.'); window.history.back();</script>";
    }
}
?>
