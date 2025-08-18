<?php
include '../config/db.php';
header("Content-Type: application/json");

$where = ["event_date > CURDATE()"];
$params = [];

if(isset($_GET['course']) && $_GET['course'] !== 'all'){
    $course = mysqli_real_escape_string($conn, $_GET['course']);
    $where[] = "target_course = '$course'";
}

if(!empty($_GET['date'])){
    $date = mysqli_real_escape_string($conn, $_GET['date']);
    $where[] = "event_date = '$date'";
}

if(!empty($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where[] = "(title LIKE '%$search%' OR category LIKE '%$search%')";
}

$sql = "SELECT * FROM events";
if(!empty($where)){
    $sql .= " WHERE " . implode(" AND ", $where);
}

$sql .= " ORDER BY event_date ASC";

$result = mysqli_query($conn, $sql);

$events = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
}

echo json_encode($events, JSON_UNESCAPED_SLASHES);
?>
