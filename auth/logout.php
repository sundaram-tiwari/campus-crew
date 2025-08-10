<?php
    $base_url = '/campus_crew';
    session_start();
    session_unset();
    session_destroy();
    header("Location: $base_url/index.php");
    exit();
?>