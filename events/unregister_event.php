<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reg_id'])) {
    $reg_id = (int)$_POST['reg_id'];

    // Check if the registration belongs to this user
    $check_sql = "SELECT reg_id FROM event_registration WHERE reg_id = $reg_id AND user_id = $user_id";
    $check_result = mysqli_query($conn, $check_sql);

    if ($check_result && mysqli_num_rows($check_result) === 1) {
        // Delete the registration
        $delete_sql = "DELETE FROM event_registration WHERE reg_id = $reg_id AND user_id = $user_id";
        if (mysqli_query($conn, $delete_sql)) {
            $_SESSION['alert_message'] = "Registration cancelled successfully!";
        } else {
            $_SESSION['alert_message'] = "Error: Unable to cancel registration.";
        }
    } else {
        $_SESSION['alert_message'] = "Invalid request or registration not found.";
    }

    mysqli_close($conn);

    // Redirect back to profile
    header("Location: ../auth/user_profile.php");
    exit();
} else {
    $_SESSION['alert_message'] = "Invalid request.";
    header("Location: ../auth/user_profile.php");
    exit();
}
