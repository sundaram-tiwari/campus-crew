<?php
    include '../config/constant.php';
    $base_url = BASE_URL;

    session_start();
    session_unset();
    session_destroy();
    header("Location: $base_url/index.php");
    exit();
?>