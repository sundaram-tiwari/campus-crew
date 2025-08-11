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
    <link rel="stylesheet" href="../assets/css/user_profile.css">
</head>
<body>
    <h1>Your Profile</h1>
    <div class="profile-container">
        <h2>Hello <?php echo $user['full_name']; ?></h2>
        <form method="post" id="profileForm" action="update_profile.php">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" disabled>
        
            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
        
            <label>Mobile:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" disabled>

            <label>Course:</label>
            <input type="text" name="course" value="<?php echo htmlspecialchars($user['course']); ?>" disabled>

            <label>Year</label>
            <select name="year" disabled>
                <option value="1" <?php if($user['year'] == 1) echo "selected"; ?>>1st Year</option>
                <option value="2" <?php if($user['year'] == 2) echo "selected"; ?>>2nd Year</option>
                <option value="3" <?php if($user['year'] == 3) echo "selected"; ?>>3rd Year</option>
                <option value="4" <?php if($user['year'] == 4) echo "selected"; ?>>4th Year</option>
            </select>

            <div class="btn-group">
                <button type="button" class="update-btn" id="editBtn">Edit</button>
                <button type="submit" class="update-btn" id="saveBtn" style="display:none;">Save</button>
                <button type="button" class="cancel-btn" id="cancelBtn" style="display:none;">Cancel</button>
            </div>
        </form>
    </div>

    <script src="../assets/js/user_profile.js"></script>
</body>
</html>