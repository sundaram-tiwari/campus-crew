<?php
session_start();

include '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $phone = trim(mysqli_real_escape_string($conn, $_POST['phone']));
    $year = trim(mysqli_real_escape_string($conn, $_POST['year']));

    if (empty($full_name) || empty($phone) || empty($year)) {
        die('Please provide all fields.');
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Invalid phone number.");
    }

    $sql = "UPDATE users SET 
        full_name = '$full_name',
        phone = '$phone',
        year = '$year'
        WHERE id = $user_id";
        
    if (mysqli_query($conn, $sql)) {
        header("Location: user_profile.php");
        exit();
    } else {
        echo "<script>alert('Failed to update data.')</script>";
    }
}


?>