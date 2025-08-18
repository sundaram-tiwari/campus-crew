<?php 
    session_start();
    include '../config/db.php';
    include '../config/constant.php';
    $base_url = BASE_URL;
    if (!isset($_SESSION["user_id"])) {
        $_SESSION['alert_message'] = "Please login to register for the events";
        header("Location: $base_url/auth/login.php");
        exit(); 
    }

    if(!isset($_GET['event_id']) || !is_numeric($_GET['event_id'])){
        die("Event not found");
    }

    $event_id = intval($_GET['event_id']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO event_registration (event_id, user_id, registered_at) VALUES ('$event_id', '$user_id', NOW())";
    if(mysqli_query($conn, $sql)){
        $_SESSION['alert_message'] = "Registration Successful.";
        header("Location: $base_url/auth/user_profile.php");
        exit(); 
    }
?>