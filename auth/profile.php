<?php
session_start();
include "../config/db.php";
?>

<?php
$base_url = "campus_crew";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>

<body>
    <h1>User Profile</h1>
    <div class="profile-card">
        <h1><?php echo $user['full_name']; ?></h1>
        <h4><?php echo "Email :- " . $user['email']; ?></h4>
        <h4><?php echo "Mobile :- " . $user['phone']; ?></h4>
        <p>Course: <?php echo $user['course']; ?></p>
        <p>Year: <?php echo $user['year'] . " Year"; ?></p>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</body>

</html>