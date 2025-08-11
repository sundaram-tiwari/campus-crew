<?php
include '../config/db.php';
header("Content-Type: application/json");

$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

$events = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
}

echo json_encode($events, JSON_UNESCAPED_SLASHES);
?>
